<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryResponseDTO;

class BreweryResponseMaker extends AbstractMaker
{
    /**
     * @return BreweryResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): BreweryResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $brewery = (new MapperBuilder())
            ->mapper()
            ->map(
                BreweryDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(BreweryResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'brewery' => $brewery
            ]));
    }
}