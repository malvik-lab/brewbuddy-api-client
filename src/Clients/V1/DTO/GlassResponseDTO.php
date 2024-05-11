<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class GlassResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param GlassDTO $glass
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public GlassDTO $glass
    ) {}
}