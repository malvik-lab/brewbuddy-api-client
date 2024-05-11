<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class GlassTranslationDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $languageId
     * @param string $glassId
     * @param string $name
     * @param string $description
     * @param LanguageDTO $language
     */
    public function __construct(
        public string $id,
        public string $languageId,
        public string $glassId,
        public string $name,
        public string $description,
        public LanguageDTO $language
    ) {}
}