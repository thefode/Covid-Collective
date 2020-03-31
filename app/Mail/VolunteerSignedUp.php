<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

class VolunteerSignedUp extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@covid-collective.co.uk')
                    ->view('emails.signedup')
                    ->with([
                        'email' => $this->email
                    ]);
    }
}
