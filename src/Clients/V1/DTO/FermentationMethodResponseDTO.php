<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class FermentationMethodResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param FermentationMethodDTO $fermentationMethod
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public FermentationMethodDTO $fermentationMethod
    ) {}
}