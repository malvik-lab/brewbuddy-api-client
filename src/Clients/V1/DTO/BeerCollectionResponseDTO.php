<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BeerCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param BeerCollectionDTO $beers
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public BeerCollectionDTO $beers
    ) {}
}