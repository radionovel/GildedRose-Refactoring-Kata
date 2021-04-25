<?php


namespace GildedRose\Strategies\Quality;


use GildedRose\Item;
use GildedRose\Strategies\StrategyInterface;

/**
 * Class BackstageQualityStrategy
 *
 * @package GildedRose\Strategies\Quality
 */
class BackstageQualityStrategy extends BaseQualityStrategy
    implements StrategyInterface
{
    /**
     * @param Item $item
     */
    public function apply(Item $item)
    {
        $increaseValue = 1;
        if ($item->sell_in < 11) {
            $increaseValue = 2;
        }

        if ($item->sell_in < 6) {
            $increaseValue = 3;
        }

        if ($item->sell_in > 0) {
            $this->increaseQuality($item, $increaseValue);
        } else {
            $this->resetQuality($item);
        }
    }
}