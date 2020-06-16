<?php

namespace Backpack\CRUD;

trait Stats
{
    /**
     * Check if the application is running in normal conditions
     * (production env, not in console, not in unit tests).
     *
     * @return void
     */
    private function runningInProduction()
    {
        if ($this->app->environment('local')) {
            return false;
        }

        if ($this->app->runningInConsole()) {
            return false;
        }

        if ($this->app->runningUnitTests()) {
            return false;
        }

        return true;
    }

    /**
     * Send usage statistics to the BackpackForLaravel.com website.
     * Used to track unlicensed usage and general usage statistics.
     *
     * No GDPR implications, since no client info is send, only server info.
     *
     * @return void
     */
    private function sendUsageStats()
    {
        
    }

    /**
     * Make a request using CURL.
     *
     * It spins up a separate process for this, and doesn't listen for a reponse,
     * so it has minimal to no impact on pageload.
     *
     * @param string $method  HTTP Method to use for the request.
     * @param string $url     URL to point the request at.
     * @param array  $payload The data you want sent to the URL.
     *
     * @return void
     */
    private function makeCurlRequest($method, $url, $payload)
    {
        $cmd = 'curl -X '.$method." -H 'Content-Type: application/json'";
        $cmd .= " -d '".json_encode($payload)."' "."'".$url."'";
        $cmd .= ' > /dev/null 2>&1 &';

        exec($cmd, $output, $exit);

        return $exit == 0;
    }

    /**
     * Make a request using Guzzle.
     *
     * This request happens in the same process as the page load,
     * and Guzzle listens for a response, so depending on the API latency and
     * geographic location this is usually slower than CURL. However,
     * unlike CURL, it works on most machines, so it's reliable.
     *
     * @param string $method  HTTP Method to use for the request.
     * @param string $url     URL to point the request at.
     * @param array  $payload The data you want sent to the URL.
     *
     * @return void
     */
    private function makeGuzzleRequest($method, $url, $payload)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $res = $client->request($method, $url, [
                'form_params'         => $payload,
                'http_errors'         => false,
                'connect_timeout'     => 0.5,
                'timeout'             => 0.5,
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // do nothing
        }
    }
}
