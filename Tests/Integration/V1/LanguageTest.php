<?php

declare(strict_types=1);

namespace Tests\Integration\V1;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\BrewBuddyClient\Clients\V1\Client;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageResponseDTO;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class LanguageTest extends TestCase
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
        $response = $this->brewBuddyClient->getLanguages();

        $this->assertInstanceOf(LanguageCollectionResponseDTO::class, $response);
    }

    /**
     * @throws InvalidSource
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws MappingError
     */
    public function testItem(): void
    {
        $response = $this->brewBuddyClient->getLanguage('9b95924e-c6a7-4d1a-94c6-a6a8e5527af4');

        $this->assertInstanceOf(LanguageResponseDTO::class, $response);
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