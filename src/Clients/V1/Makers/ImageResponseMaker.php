<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageResponseDTO;

class ImageResponseMaker extends AbstractMaker
{
    /**
     * @return ImageResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): ImageResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $image = (new MapperBuilder())
            ->mapper()
            ->map(
                ImageDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(ImageResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'image' => $image
            ]));
    }
}