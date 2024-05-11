<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerCollectionResponseDTO;

class BeerCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return BeerCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): BeerCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $beers = (new MapperBuilder())
            ->mapper()
            ->map(
                BeerCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(BeerCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'beers' => $beers->getItems()
            ]));
    }
}