<?php

namespace Horizondoxa\AccurateBuddy\Core;

use GuzzleHttp\Client;

class AccurateClient
{
    protected $client;
    protected $baseUrl;
    protected $token;
    protected $signature;
    protected $timeStamp;
    // 

    public function __construct($token, $signature, $baseUrl = null)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->client = new Client([
            'verify' => false,
        ]);
        $this->baseUrl = $baseUrl;
        $this->token = $token;
        $this->timeStamp = date("d/m/Y H:i:s");
        $this->signature = base64_encode(hash_hmac('sha256', $this->timeStamp, $signature, true));
    }

    public function request($method, $endpoint, array $options = [])
    {
        $options['headers']['Authorization'] = 'Bearer ' . $this->token;
        $options['headers']['X-Api-Signature'] = $this->signature;
        $options['headers']['X-Api-Timestamp'] = $this->timeStamp;
        $options['headers']['Accept'] = 'application/json';

        if (!empty($options['json'])) {
            $options['headers']['Content-Type'] = 'application/json';
        }

        $response = $this->client->request($method, $this->baseUrl . $endpoint, $options);

        return json_decode($response->getBody()->getContents(), true);
    }
}
