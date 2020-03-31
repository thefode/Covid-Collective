<?php

namespace Covid\Resources\Domain;

use URL\Normalizer;

final class Url extends AttributeWithFilter
{
    public function __construct(string $url)
    {
        $url = $this->removeUtms($url);

        $url = (new Normalizer( $url ))->normalize();

        parent::__construct( $url );
    }

    protected function getFilter(): string
    {
        return FILTER_VALIDATE_URL;
    }

    private function removeUtms(string $url)
    {
        $parts = parse_url($url);

        if (!array_key_exists('query', $parts) || strlen($parts['query']) === 0) {
            return $url;
        }

        parse_str($parts['query'], $query);
        $keep = [];
        foreach ($query as $key => $value) {
            if (substr(strtolower($key), 0, 4) !== 'utm_') {
                $keep[strtolower($key)] = $value;
            }
        }

        ksort($keep);
        $parts['query'] = http_build_query($keep);

        $combined = $this->unparseUrl($parts);

        return rtrim($combined, '?');
    }

    private function unparseUrl(array $parsed_url): string
    {
        $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
        $host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
        $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
        $user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
        $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
        $pass     = ($user || $pass) ? "$pass@" : '';
        $path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
        $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
        $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';

        return "$scheme$user$pass$host$port$path$query$fragment";
    }

}
