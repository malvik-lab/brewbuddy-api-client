<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class FermentationMethodTranslationDTO implements DTOInterface
{
    public function __construct(
        public string $id,
        public string $languageId,
        public string $fermentationMethodId,
        public string $name,
        public string $description,
        public LanguageDTO $language
    ) {}
}