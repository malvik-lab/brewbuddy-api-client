<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class ImageResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param ImageDTO $image
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public ImageDTO $image
    ) {}
}