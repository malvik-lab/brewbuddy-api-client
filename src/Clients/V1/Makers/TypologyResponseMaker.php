<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyResponseDTO;

class TypologyResponseMaker extends AbstractMaker
{
    /**
     * @return TypologyResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): TypologyResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $typology = (new MapperBuilder())
            ->mapper()
            ->map(
                TypologyDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(TypologyResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'typology' => $typology
            ]));
    }
}