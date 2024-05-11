<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\GlassCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\GlassCollectionResponseDTO;

class GlassCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return GlassCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): GlassCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $glasses = (new MapperBuilder())
            ->mapper()
            ->map(
                GlassCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(GlassCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'glasses' => $glasses->getItems()
            ]));
    }
}