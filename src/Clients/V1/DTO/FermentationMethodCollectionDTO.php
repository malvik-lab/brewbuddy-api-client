<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class FermentationMethodCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param FermentationMethodDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(FermentationMethodDTO::class, $this->items);

        parent::__construct($items);
    }
}