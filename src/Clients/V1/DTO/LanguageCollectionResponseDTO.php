<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class LanguageCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param LanguageCollectionDTO $languages
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public LanguageCollectionDTO $languages
    ) {}
}