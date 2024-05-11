<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryCollectionResponseDTO;

class BreweryCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return BreweryCollectionResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): BreweryCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $breweries = (new MapperBuilder())
            ->mapper()
            ->map(
                BreweryCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(BreweryCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'breweries' => $breweries->getItems()
            ]));
    }
}