<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class GlassCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param GlassCollectionDTO $glasses
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public GlassCollectionDTO $glasses
    ) {}
}