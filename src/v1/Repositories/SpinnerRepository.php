<?php

namespace Phailgorithm\SpinnerClient\v1\Repositories;


/**
 * Spinner repository class for managing Spinner resources
 */
class SpinnerRepository
{
    /**
     * @var \GuzzleHttp\Client
     */
    private \GuzzleHttp\Client $client;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get a spinner string via unique intege id or unique string key
     *
     * @param integer|string $unique
     * @param array $params
     * @param array $body
     * @return string
     * 
     */
    public function get(int|string $unique, array $params = array(), array $body = array()): string
    {
        try {
            $response = $this->client->get('spinners/' . $unique, [
                'query' => $params,
                'body' => json_encode($body),
            ]);

            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $exc) {
            return '';
        }
    }
}
