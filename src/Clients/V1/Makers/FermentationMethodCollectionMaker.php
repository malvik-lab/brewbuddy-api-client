<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodCollectionResponseDTO;

class FermentationMethodCollectionMaker extends AbstractMaker
{
    /**
     * @return FermentationMethodCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): FermentationMethodCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $countries = (new MapperBuilder())
            ->mapper()
            ->map(
                FermentationMethodCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(FermentationMethodCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'fermentationMethods' => $countries->getItems()
            ]));
    }
}