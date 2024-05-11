<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerResponseDTO;

class BeerResponseMaker extends AbstractMaker
{
    /**
     * @return BeerResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): BeerResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $beer = (new MapperBuilder())
            ->mapper()
            ->map(
                BeerDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(BeerResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'beer' => $beer
            ]));
    }
}