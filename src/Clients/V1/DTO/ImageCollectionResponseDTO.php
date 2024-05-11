<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class ImageCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param ImageCollectionDTO $images
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public ImageCollectionDTO $images
    ) {}
}