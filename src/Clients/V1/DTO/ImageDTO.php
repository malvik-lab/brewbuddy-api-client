<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Interfaces\DTOInterface;

final readonly class ImageDTO implements DTOInterface
{
    public function __construct(
        public string $id,
        public string $url,
        public string $filename,
        public string $extension,
        public int $width,
        public int $height,
        public string $mime,
        public int $size
    ) {}
}