<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class LanguageResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param LanguageDTO $language
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public LanguageDTO $language
    ) {}
}