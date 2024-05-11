<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageCollectionDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageCollectionResponseDTO;

class LanguageCollectionResponseMaker extends AbstractMaker
{
    /**
     * @return LanguageCollectionResponseDTO
     * @throws MappingError
     * @throws InvalidSource
     */
    public function make(): LanguageCollectionResponseDTO
    {
        $rateLimit = $this->makeRateLimit();

        $languages = (new MapperBuilder())
            ->mapper()
            ->map(
                LanguageCollectionDTO::class,
                Source::json($this->response->getBody())->camelCaseKeys()
            );

        return (new MapperBuilder())
            ->mapper()
            ->map(LanguageCollectionResponseDTO::class, Source::array([
                'rateLimit' => $rateLimit,
                'languages' => $languages->getItems()
            ]));
    }
}