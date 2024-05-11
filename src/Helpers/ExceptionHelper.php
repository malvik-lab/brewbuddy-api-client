<?php

namespace MalvikLab\BrewBuddyClient\Helpers;

use MalvikLab\BrewBuddyClient\Client;

class ExceptionHelper
{
    public static function message(string $message): string
    {
        return sprintf('[ %s ] %s',
            Client::NAME,
            $message
        );
    }
}