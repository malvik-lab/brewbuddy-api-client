<?php

declare(strict_types=1);

namespace Tests\Integration\V1;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\BrewBuddyClient\Clients\V1\Client;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageResponseDTO;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class ImageTest extends TestCase
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
        $response = $this->brewBuddyClient->getImages();

        $this->assertInstanceOf(ImageCollectionResponseDTO::class, $response);
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testItem(): void
    {
        $response = $this->brewBuddyClient->getImage('003ccb92-a979-4cb8-b710-36559e9444ce');

        $this->assertInstanceOf(ImageResponseDTO::class, $response);
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

        $this->brewBuddyClient->getCountry('wrong-id');
    }
}