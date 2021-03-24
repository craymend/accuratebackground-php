<?php

namespace Craymend\AccurateSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Order extends ApiBase
{
    /**
     * "The Order resource represents your order to complete a background 
     *    check on a specific Candidate, with your choice of search 
     *    package and zero or more optional search additions."
     * 
     * https://developer.accuratebackground.com/#/apidoc
     * 
     * @return stdObject
     */
    public function getOrders()
    {
        $url = "order";

        $curOptions = $this->options;
        $curOptions['auth'] = [$this->clientid, $this->secret];

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

    /**
     * "Specify a single orderId in the Resource URL to see only that Order."
     * 
     * @return stdObject
     */
    public function getOrder($orderId)
    {
        $url = "order/$orderId";

        $curOptions = $this->options;
        $curOptions['auth'] = [$this->clientid, $this->secret];

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

    /**
     * "The Order resource represents your order to complete a background 
     *    check on a specific Candidate, with your choice of search 
     *    package and zero or more optional search additions."
     * 
     * See accurate docs for list of allowed params
     *   and creating sandbox orders with specified result pass, fail, etc
     *   https://developer.accuratebackground.com/#/apidoc
     * 
     * Particularly important parameters are "packageType" and "workflow"
     *   Package Options: [PKG_BASIC, PKG_STANDARD, PKG_PRO, PKG_EMPTY] 
     *   Workflow Options: [EXPRESS, INTERACTIVE]
     * 
     * Orders require "jobLocation.city", "jobLocation.region", and "jobLocation.country"
     * 
     * "INTERACTIVE" workflow only requires "firstName", "lastName", and "email" 
     *     fields be set on the candidate record
     * "EXPRESS" workflow requires "firstName", "lastName", "email", "address", 
     *     "city", "region", "country", "postalCode", "dateOfBirth", "phone", and "ssn" 
     *     fields are set on the candidate record
     * 
     * @param Array $data ['key' => 'value']
     * @return stdObject
     */
    public function createOrder($data)
    {
        $url = "order";

        $curOptions = $this->options;
        $curOptions['auth'] = [$this->clientid, $this->secret];
        $curOptions['form_params'] = $data;

        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        try{
            $response = $client->request('POST', $url, $curOptions);

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