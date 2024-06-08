<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BeerTranslationDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $languageId
     * @param string $beerId
     * @param string $slogan
     * @param string $description
     * @param LanguageDTO $language
     */
    public function __construct(
        public string $id,
        public string $languageId,
        public string $beerId,
        public string $slogan,
        public string $description,
        public LanguageDTO $language
    ) {}
}