<?php

declare(strict_types=1);

namespace Tests\Integration\V1;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\BrewBuddyClient\Clients\V1\Client;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerResponseDTO;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class BeerTest extends TestCase
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
        $response = $this->brewBuddyClient->getBeers();

        $this->assertInstanceOf(BeerCollectionResponseDTO::class, $response);
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testItem(): void
    {
        $response = $this->brewBuddyClient->getBeer('0692bda5-b13e-4596-a3c0-e88c404490be');

        $this->assertInstanceOf(BeerResponseDTO::class, $response);
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

        $this->brewBuddyClient->getBeer('wrong-id');
    }
}