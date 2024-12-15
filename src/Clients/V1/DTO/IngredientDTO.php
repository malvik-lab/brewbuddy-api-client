<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final class IngredientDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $code
     * @param IngredientTranslationDTO[] $translations
 */
    public function __construct(
        public string $id,
        public string $code,
        public array $translations
    ) {}
}