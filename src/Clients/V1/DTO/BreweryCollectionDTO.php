<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class BreweryCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param BreweryDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(BreweryDTO::class, $this->items);

        parent::__construct($items);
    }
}