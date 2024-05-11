<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class LanguageDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $name
     * @param string $code
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $code
    ) {}
}