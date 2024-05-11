<?php

declare(strict_types=1);

namespace Tests\Integration\V1;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\BrewBuddyClient\Clients\V1\Client;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodResponseDTO;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class FermentationMethodTest extends TestCase
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
        $response = $this->brewBuddyClient->getFermentationMethods();

        $this->assertInstanceOf(FermentationMethodCollectionResponseDTO::class, $response);
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testItem(): void
    {
        $response = $this->brewBuddyClient->getFermentationMethod('9ba5d514-ecaf-4976-ae66-bcef6cb80f10');

        $this->assertInstanceOf(FermentationMethodResponseDTO::class, $response);
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

        $this->brewBuddyClient->getFermentationMethod('wrong-id');
    }
}