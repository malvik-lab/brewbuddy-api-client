<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class CountryCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param CountryDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(CountryDTO::class, $this->items);

        parent::__construct($items);
    }
}