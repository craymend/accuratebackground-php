<?php

namespace Craymend\AccurateSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiBase
{
    function __construct($options) {
        $this->clientid = config('accurate-sdk.clientid');
        $this->secret = config('accurate-sdk.secret');
        $this->baseUrl = 'https://api.accuratebackground.com/v3/';

        // used to set query options
        $this->options = $options;
    }

    /**
     * The Alive resource is a simple 'ping’ API call to connect to the platform for testing purposes. Alive can be called without basic auth.
     * 
     * @return stdObject
     */
    public function checkAlive(){
        $url = "alive";

        $curOptions = $this->options;

        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        try{
            $response = $client->request('GET', $url, $curOptions);

            $body = (string) $response->getBody();
            $data = json_decode($body);

            return (object) [
                'code' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
                'data' => $data,
                'status' => 'success'
            ];
        }catch(GuzzleException $e){
            return (object) [
                'error' => $e->getMessage(),
                'status' => 'fail'
            ];
        }
    }
}