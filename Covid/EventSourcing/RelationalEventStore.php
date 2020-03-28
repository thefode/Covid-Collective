<?php
namespace Covid\EventSourcing;

use Illuminate\Database\QueryException;
use Illuminate\Database\Connection;
use Broadway\EventStore\Exception\DuplicatePlayheadException;
use Broadway\EventStore\EventStore;
use Broadway\Domain\Metadata;
use Broadway\Domain\DomainMessage;
use Broadway\Domain\DomainEventStream;
use Broadway\Domain\DateTime;

class RelationalEventStore implements EventStore
{
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * @param  mixed $id
     * @return DomainEventStream
     */
    public function load($id): DomainEventStream
    {
        return new DomainEventStream(array_map([$this, 'eventStoreToDomainMessage'], $this->getEvents($id)));
    }

    /**
     * @param  mixed $id
     * @param  int   $playhead
     * @return DomainEventStream
     */
    public function loadFromPlayhead($id, int $playhead): DomainEventStream
    {
        return new DomainEventStream(array_map([$this, 'eventStoreToDomainMessage'], $this->getEvents($id, $playhead)));
    }

    /**
     * @param  mixed             $id
     * @param  DomainEventStream $eventStream
     * @throws DuplicatePlayheadException
     */
    public function append($id, DomainEventStream $eventStream) : void
    {
        try {
            $this->db->table('eventStore')->insert($this->domainEventStreamToArray($id, $eventStream));

        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                throw new DuplicatePlayheadException($eventStream);
            } else {
                throw $e;
            }
        }
    }

    /**
     * Helper Method.
     * Convert a DomainEventStream into an array to be stored in event_store db table.
     *
     * @param  $id          - The aggregate ID for the event stream.
     * @param  DomainEventStream $eventStream - The stream to be store in event_store.
     * @return array
     */
    private function domainEventStreamToArray($id, DomainEventStream $eventStream): array
    {
        $out = [];

        foreach ($eventStream as $event) {
            $playhead    = $event->getPlayhead();
            $eventData  = $event->getPayload();
            $eventName  = get_class($eventData);
            $metaData   = json_encode($event->getMetadata());
            $recordedOn = $event->getRecordedOn();

            $out[] = [
                'streamId'      => $id,
                'streamVersion' => $playhead,
                'eventName'     => $eventName,
                'eventData'     => $eventData->serialize(),
                'metaData'      => $metaData,
                'storedAt'      => $recordedOn->toNative()->format('Y-m-d H:i:s'),
            ];
        }

        return $out;
    }

    /**
     * Helper Method.
     * Convert an event_store record to a DomainMessage
     *
     * @param  object $event - The individual event record from event_store
     * @return DomainMessage
     */
    private function eventStoreToDomainMessage($event): DomainMessage
    {
        return new DomainMessage(
            $event->streamId,
            $event->streamVersion,
            new MetaData(json_decode($event->metaData, true)),
            call_user_func($event->eventName.'::deserialize', $event->eventData),
            DateTime::fromString($event->storedAt)
        );
    }

    /**
     * Helper Method.
     * Get an array of the events in this stream, potentially at a given playhead index.
     *
     * @param  string $id       - The stream id for the event(s)
     * @param  int    $playhead - The index to start getting event(s) from.
     * @return array
     */
    private function getEvents(string $id, int $playhead=0): array
    {
        return $this->db->table('eventStore')
            ->where('streamId', $id)
            ->where('streamVersion', '>=', $playhead)
            ->orderBy('streamVersion', 'ASC')
            ->get()
            ->toArray();
    }
}
