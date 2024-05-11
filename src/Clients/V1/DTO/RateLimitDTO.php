<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class RateLimitDTO implements DTOInterface
{
    /**
     * @param int $limit
     * @param int $remaining
     */
    public function __construct(
        public int $limit,
        public int $remaining
    ) {}
}