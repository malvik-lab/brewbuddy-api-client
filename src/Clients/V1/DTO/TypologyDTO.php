<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class TypologyDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $name
     * @param TypologyTranslationDTO[] $translations
     */
    public function __construct(
        public string $id,
        public string $name,
        public array $translations
    ) {}
}