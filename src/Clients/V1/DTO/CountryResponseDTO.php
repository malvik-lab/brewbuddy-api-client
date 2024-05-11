<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class CountryResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param CountryDTO $country
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public CountryDTO $country
    ) {}
}