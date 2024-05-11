<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageResponseDTO;

class LanguageResponseMaker extends AbstractMaker
{
    /**
     * @return LanguageResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): LanguageResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $language = (new MapperBuilder())
            ->mapper()
            ->map(
                LanguageDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(LanguageResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'language' => $language
            ]));
    }
}