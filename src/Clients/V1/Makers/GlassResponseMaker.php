<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\GlassDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\GlassResponseDTO;

class GlassResponseMaker extends AbstractMaker
{
    /**
     * @return GlassResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): GlassResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $glass = (new MapperBuilder())
            ->mapper()
            ->map(
                GlassDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(GlassResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'glass' => $glass
            ]));
    }
}