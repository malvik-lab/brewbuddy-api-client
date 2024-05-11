<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageCollectionResponseDTO;

class ImageCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return ImageCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): ImageCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $images = (new MapperBuilder())
            ->mapper()
            ->map(
                ImageCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(ImageCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'images' => $images->getItems()
            ]));
    }
}