<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class TypologyCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param TypologyDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(TypologyDTO::class, $this->items);

        parent::__construct($items);
    }
}