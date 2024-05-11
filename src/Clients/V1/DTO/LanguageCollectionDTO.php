<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

use MalvikLab\BrewBuddyClient\Helpers\ArrayHelper;

final class LanguageCollectionDTO extends AbstractCollectionDTO
{
    /**
     * @param LanguageDTO[] $items
     */
    public function __construct(public array $items)
    {
        $items = ArrayHelper::filterByType(LanguageDTO::class, $this->items);

        parent::__construct($items);
    }
}