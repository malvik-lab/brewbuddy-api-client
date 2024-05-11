<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryCollectionResponseDTO;

class CountryCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return CountryCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): CountryCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $countries = (new MapperBuilder())
            ->mapper()
            ->map(
                CountryCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(CountryCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'countries' => $countries->getItems()
            ]));
    }
}