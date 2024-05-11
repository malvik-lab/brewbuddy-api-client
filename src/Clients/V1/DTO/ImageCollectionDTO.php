<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class ImageCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param ImageDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(ImageDTO::class, $this->items);

        parent::__construct($items);
    }
}