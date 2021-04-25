<?php


namespace GildedRose\Strategies\Quality;


use GildedRose\Item;
use GildedRose\Strategies\StrategyInterface;

class DefaultQualityStrategy extends BaseQualityStrategy
    implements StrategyInterface
{
    public function apply(Item $item)
    {
        $this->decreaseQuality($item, $item->sell_in > 0 ? 1 : 2);
    }
}
