<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyCollectionResponseDTO;

class TypologyCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return TypologyCollectionResponseDTO
     * @throws InvalidSource
     * @throws MappingError
     */
    public function make(): TypologyCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $typologies = (new MapperBuilder())
            ->mapper()
            ->map(
                TypologyCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(TypologyCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'typologies' => $typologies->getItems()
            ]));
    }
}