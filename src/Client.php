<?php

namespace MalvikLab\BrewBuddyClient;

use GuzzleHttp\Client as HttpClient;
use MalvikLab\BrewBuddyClient\Interfaces\ClientInterface;
use MalvikLab\BrewBuddyClient\Clients\V1\Client as ClientV1;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidClientVersionException;

class Client
{
    const  NAME = 'BREWBUDDY API CLIENT';
    const  VERSION = '1.0.5';
    const  CLIENT_V1 = 'V1';

    /**
     * @param string $version
     * @param HttpClient|null $httpClient
     * @return ClientInterface
     * @throws InvalidClientVersionException
     */
    public static function make(string $version, null | HttpClient $httpClient = null): ClientInterface
    {
        return match ($version) {
            self::CLIENT_V1 => new ClientV1($httpClient),
            default => throw new InvalidClientVersionException('Invalid Client Version'),
        };
    }
}