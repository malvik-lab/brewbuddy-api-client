<?php

declare(strict_types=1);

namespace Tests\Integration\V1;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\BrewBuddyClient\Clients\V1\Client;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryResponseDTO;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class BreweryTest extends TestCase
{
    private Client $brewBuddyClient;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->brewBuddyClient = new Client();
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testCollection(): void
    {
        $response = $this->brewBuddyClient->getBreweries();

        $this->assertInstanceOf(BreweryCollectionResponseDTO::class, $response);
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testItem(): void
    {
        $response = $this->brewBuddyClient->getBrewery('9b960c84-5738-4cf1-91d4-4acd2eb9fc3e');

        $this->assertInstanceOf(BreweryResponseDTO::class, $response);
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testWrongItem(): void
    {
        $this->expectException(ClientException::class);

        $this->brewBuddyClient->getBrewery('wrong-id');
    }
}