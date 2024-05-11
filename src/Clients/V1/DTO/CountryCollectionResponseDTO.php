<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class CountryCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param CountryCollectionDTO $countries
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public CountryCollectionDTO $countries
    ) {}
}