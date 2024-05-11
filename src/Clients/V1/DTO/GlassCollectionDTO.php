<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class GlassCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param GlassDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(GlassDTO::class, $this->items);

        parent::__construct($items);
    }
}