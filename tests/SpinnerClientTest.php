<?php

use PHPUnit\Framework\TestCase;
use Phailgorithm\SpinnerClient\v1\Client;

final class SpinnerClientTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = new Client($_ENV['SPINNER_API_URL'], $_ENV['SPINNER_API_SECRET']);
    }

    public function testGetSpinnerByKey(): void
    {
        $value = $this->client->spinners->get('prodotti-spinner');
        $this->assertEquals($value, 'lavora solo con prodotti di qualità:');
    }

    public function testGetSpinnerByMissingKey(): void
    {
        $empty = $this->client->spinners->get('xyz');
        $this->assertEquals($empty, '');
    }

    public function testGetSpinnerById(): void
    {
        $value = $this->client->spinners->get(140);
        $this->assertEquals($value, 'Avete bisogno di una baby-sitter, un comodo servizio di spesa a domicilio, un/una dog-sitter?');
    }

    public function testGetSpinnerWithData(): void
    {
        $value = $this->client->spinners->get('prodotti-spinner', ['company' => 'xyz']);
        $this->assertEquals($value, 'xyz lavora solo con prodotti di qualità:');
    }
}
