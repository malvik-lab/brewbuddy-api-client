<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BreweryCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param BreweryCollectionDTO $breweries
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public BreweryCollectionDTO $breweries
    ) {}
}