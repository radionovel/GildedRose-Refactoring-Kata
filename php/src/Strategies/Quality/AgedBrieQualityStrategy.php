<?php


namespace GildedRose\Strategies\Quality;


use GildedRose\Item;
use GildedRose\Strategies\StrategyInterface;

class AgedBrieQualityStrategy extends BaseQualityStrategy
    implements StrategyInterface
{
    /**
     * @param Item $item
     */
    public function apply(Item $item)
    {
        $this->increaseQuality($item, ($item->sell_in > 0 ? 1 : 2));
    }
}
