<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\DTO;

abstract class AbstractCollectionDTO
{
    /**
     * @param array<object> $items
     */
    public function __construct(protected array $items)
    {}

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return array<object>
     */
    public function getItems(): array
    {
        return $this->items;
    }
}