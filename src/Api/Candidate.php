<?php

namespace Craymend\AccurateSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Candidate extends ApiBase
{
    /**
     * "Specify a single candidateId in the Resource URL to see only that 
     *    Candidate. Leave the Resource URL bare to retrieve all Candidates."
     * 
     * https://developer.accuratebackground.com/#/apidoc
     * 
     * @return stdObject
     */
    public function getCandidates()
    {
        $url = "candidate";

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
     * "Specify a single candidateId in the Resource URL to see only that Candidate."
     * 
     * @return stdObject
     */
    public function getCandidate($candidateId)
    {
        $url = "candidate/$candidateId";

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
     * "The Candidate resource is used create a new candidate to 
     *    use in any number of background check orders and searches."
     * 
     * See accurate docs for list of allowed params
     * 
     * https://developer.accuratebackground.com/#/apidoc
     * 
     * @param Array $data ['key' => 'value']
     * @return stdObject
     */
    public function createCandidate($data)
    {
        $url = "candidate";

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

    /**
     * "To add additional optional information, such as a government id, 
     *    after the candidate has been created, use PUT and the new 
     *    optional parameters. Where the new attribute is nested, use 
     *    the top of the nested attribute name and hash notation for the key."
     * 
     * See accurate docs for list of allowed params
     * 
     * https://developer.accuratebackground.com/#/apidoc
     * 
     * @param Array $data ['key' => 'value']
     * @return stdObject
     */
    public function editCandidate($candidateId, $data)
    {
        $url = "candidate/$candidateId";

        $curOptions = $this->options;
        $curOptions['auth'] = [$this->clientid, $this->secret];
        $curOptions['form_params'] = $data;

        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        try{
            $response = $client->request('PUT', $url, $curOptions);

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