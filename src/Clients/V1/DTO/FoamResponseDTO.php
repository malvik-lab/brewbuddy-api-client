<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class FoamResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param FoamDTO $foam
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public FoamDTO $foam
    ) {}
}