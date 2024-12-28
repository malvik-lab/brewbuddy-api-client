<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final class BeerDTO implements DTOInterface
{
    /**
     * @param string $id
     * @param string $name
     * @param string $breweryId
     * @param string $typologyId
     * @param string $imageId
     * @param string $fermentationMethodId
     * @param string $foamId
     * @param int $releasedYear
     * @param bool $available
     * @param float $abv
     * @param float $ibu
     * @param float $srm
     * @param bool $filtrated
     * @param bool $pasteurized
     * @param int $minimumServingTemperature
     * @param int $maximumServingTemperature
     * @param BeerTranslationDTO[] $translations
     * @param TypologyDTO $typology
     * @param ImageDTO $image
     * @param BreweryDTO $brewery
     * @param GlassDTO[] $recommendedGlasses
     * @param FermentationMethodDTO $fermentationMethod
     * @param FoamDTO $foam
     * @param IngredientDTO[] $ingredients
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $breweryId,
        public string $typologyId,
        public string $imageId,
        public string $fermentationMethodId,
        public string $foamId,
        public int $releasedYear,
        public bool $available,
        public float $abv,
        public float $ibu,
        public float $srm,
        public bool $filtrated,
        public bool $pasteurized,
        public int $minimumServingTemperature,
        public int $maximumServingTemperature,
        public array $translations,
        public TypologyDTO $typology,
        public ImageDTO $image,
        public BreweryDTO $brewery,
        public array $recommendedGlasses,
        public FermentationMethodDTO $fermentationMethod,
        public FoamDTO $foam,
        public array $ingredients
    ) {}
}