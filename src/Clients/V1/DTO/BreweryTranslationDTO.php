<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BreweryTranslationDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $languageId
     * @param string $breweryId
     * @param string $history
     * @param LanguageDTO $language
     */
    public function __construct(
        public string $id,
        public string $languageId,
        public string $breweryId,
        public string $history,
        public LanguageDTO $language
    ) {}
}