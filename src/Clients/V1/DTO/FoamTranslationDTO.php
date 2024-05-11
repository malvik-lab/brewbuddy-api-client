<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class FoamTranslationDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $languageId
     * @param string $foamId
     * @param string $name
     * @param LanguageDTO $language
     */
    public function __construct(
        public string $id,
        public string $languageId,
        public string $foamId,
        public string $name,
        public LanguageDTO $language
    ) {}
}