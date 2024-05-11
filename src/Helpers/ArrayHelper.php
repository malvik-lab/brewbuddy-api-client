<?php

namespace MalvikLab\BrewBuddyClient\Helpers;

class ArrayHelper
{
    /**
     * @param string $class
     * @param array<object> $items
     * @return array<object>
     */
    public static function filterByType(string $class, array $items): array
    {
        return array_filter($items, function($item) use ($class) {
            return is_object($item) && is_a($item, $class);
        });
    }
}