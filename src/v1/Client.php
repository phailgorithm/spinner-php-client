<?php

namespace Phailgorithm\SpinnerClient\v1;

use Phailgorithm\SpinnerClient\v1\Repositories\SpinnerRepository;

/**
 * Http client for Spinner microservice api
 */
class Client
{

    /**
     * @var \GuzzleHttp\Client
     */
    private \GuzzleHttp\Client $client;

    /**
     * Repository of Spinner resources
     *
     * @var CityRepository
     */
    public readonly SpinnerRepository $spinners;


    public function __construct(string $url, string $token)
    {

        $this->client = new \GuzzleHttp\Client(
            [
                'base_uri' => $url . '/api/v1/',
                'headers' => [
                    'Accept' => 'text/html; charset=utf-8',
                    'User-Agent' => 'spinner-php-client',
                    'X-Spinner-Client-Version' => 'v0.1.2',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]
        );

        $this->spinners = new SpinnerRepository($this->client);
    }
}
