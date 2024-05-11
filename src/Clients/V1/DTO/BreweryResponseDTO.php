<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BreweryResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param BreweryDTO $brewery
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public BreweryDTO $brewery
    ) {}
}