<?php


namespace GildedRose\Strategies\Quality;


use GildedRose\Item;

class BaseQualityStrategy
{
    /**
     * @param Item $item
     * @param int  $value
     */
    protected function increaseQuality(Item $item, $value = 1)
    {
        $this->setQuality($item, $item->quality + $value);
    }

    private function setQuality(Item $item, $newQuality)
    {
        if ($newQuality < 0) {
            $newQuality = 0;
        } elseif ($newQuality > 50) {
            $newQuality = 50;
        }

        $item->quality = $newQuality;
    }

    /**
     * @param Item $item
     * @param int  $value
     */
    protected function decreaseQuality(Item $item, $value = 1)
    {
        $this->setQuality($item, $item->quality - $value);
    }

    /**
     * @param Item $item
     */
    protected function resetQuality(Item $item)
    {
        $this->setQuality($item, 0);
    }
}