<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class BeerResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param BeerDTO $beer
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public BeerDTO $beer
    ) {}
}