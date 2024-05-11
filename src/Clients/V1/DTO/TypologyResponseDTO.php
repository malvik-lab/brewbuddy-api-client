<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class TypologyResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param TypologyDTO $typology
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public TypologyDTO $typology
    ) {}
}