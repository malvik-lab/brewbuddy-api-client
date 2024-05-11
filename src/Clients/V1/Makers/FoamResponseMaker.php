<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamResponseDTO;

class FoamResponseMaker extends AbstractMaker
{
    /**
     * @return FoamResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): FoamResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $foam = (new MapperBuilder())
            ->mapper()
            ->map(
                FoamDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(FoamResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'foam' => $foam
            ]));
    }
}