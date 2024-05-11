<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class FoamCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param FoamCollectionDTO $foams
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public FoamCollectionDTO $foams
    ) {}
}