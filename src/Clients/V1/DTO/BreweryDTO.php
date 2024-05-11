<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BreweryDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $name
     * @param string $countryId
     * @param string $imageId
     * @param int $foundedYear
     * @param CountryDTO $country
     * @param ImageDTO $image
     * @param BreweryTranslationDTO[] $translations
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $countryId,
        public string $imageId,
        public int $foundedYear,
        public CountryDTO $country,
        public ImageDTO $image,
        public array $translations
    ) {}
}