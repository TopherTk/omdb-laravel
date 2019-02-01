<?php

namespace TopherTk\OmdbLaravel\Service;

use TopherTk\OmdbLaravel\Contracts\OmdbClient as OmdbClientInterface;
use TopherTk\OmdbLaravel\Entities\Query;
use TopherTk\OmdbLaravel\Exceptions\InvalidCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class OmdbClient implements OmdbClientInterface
{

    /**
     * @var Client $client
     */
    private $client;

    /**
     * @var Query $query
     */
    private $query;

    const REQUEST_TYPE = "GET";

    /**
     * OmdbClient constructor.
     * @param Query $query
     */
    public function __construct(Query $query)
    {
        $this->client = new Client();
        $this->query = $query;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMediaInformation()
    {
        try {
            $response = $this->client->request(self::REQUEST_TYPE, $this->getFullAuthorisedUrl());
            return json_decode($response->getBody(), true);
        } catch(ClientException $clientException) {
            if ($clientException->getCode() == 401) {
                throw InvalidCredentials::incorrectApiKey();
            }
        }
    }

    /**
     * @return string
     */
    private function getFullAuthorisedUrl() : string
    {
        return self::API_BASE_ENDPOINT . env("OMDB_API_KEY") . "&" . $this->query->getMappedParameters();
    }
}