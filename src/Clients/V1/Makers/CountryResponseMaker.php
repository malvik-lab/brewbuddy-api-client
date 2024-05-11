<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryResponseDTO;

class CountryResponseMaker extends AbstractMaker
{
    /**
     * @return CountryResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): CountryResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $country = (new MapperBuilder())
            ->mapper()
            ->map(
                CountryDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(CountryResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'country' => $country
            ]));
    }
}