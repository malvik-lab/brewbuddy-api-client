<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodResponseDTO;

class FermentationMethodResponseMaker extends AbstractMaker
{
    /**
     * @return FermentationMethodResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): FermentationMethodResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $fermentationMethod = (new MapperBuilder())
            ->mapper()
            ->map(
                FermentationMethodDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(FermentationMethodResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'fermentationMethod' => $fermentationMethod
            ]));
    }
}