<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class FermentationMethodCollectionResponseDTO implements DTOInterface
{
    /**
     * @param RateLimitDTO $rateLimit
     * @param FermentationMethodCollectionDTO $fermentationMethods
     */
    public function __construct(
        public RateLimitDTO $rateLimit,
        public FermentationMethodCollectionDTO $fermentationMethods
    ) {}
}