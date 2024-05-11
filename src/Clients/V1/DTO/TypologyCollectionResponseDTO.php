<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class TypologyCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param TypologyCollectionDTO $typologies
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public TypologyCollectionDTO $typologies
    ) {}
}