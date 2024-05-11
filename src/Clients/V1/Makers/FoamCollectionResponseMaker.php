<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamCollectionResponseDTO;

class FoamCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return FoamCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): FoamCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $foams = (new MapperBuilder())
            ->mapper()
            ->map(
                FoamCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(FoamCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'foams' => $foams->getItems()
            ]));
    }
}