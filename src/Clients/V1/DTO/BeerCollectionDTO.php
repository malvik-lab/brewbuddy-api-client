<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class BeerCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param BeerDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(BeerDTO::class, $this->items);

        parent::__construct($items);
    }
}