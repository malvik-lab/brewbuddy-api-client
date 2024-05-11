<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class FoamCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param FoamDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(FoamDTO::class, $this->items);

        parent::__construct($items);
    }
}