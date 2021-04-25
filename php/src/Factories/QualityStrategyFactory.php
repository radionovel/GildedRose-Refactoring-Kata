<?php


namespace GildedRose\Factories;


use GildedRose\Item;
use GildedRose\Strategies\Quality\AgedBrieQualityStrategy;
use GildedRose\Strategies\Quality\BackstageQualityStrategy;
use GildedRose\Strategies\Quality\ConjuredQualityStrategy;
use GildedRose\Strategies\Quality\DefaultQualityStrategy;
use GildedRose\Strategies\Quality\SulfurasQualityStrategy;
use GildedRose\Strategies\StrategyInterface;

/**
 * Class StrategyFactory
 *
 * @package GildedRose\Factories
 */
class QualityStrategyFactory
{
    private $strategies = [
        'Aged Brie' => AgedBrieQualityStrategy::class,
        'Sulfuras, Hand of Ragnaros' => SulfurasQualityStrategy::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstageQualityStrategy::class,
        'Conjured Mana Cake' => ConjuredQualityStrategy::class,
    ];

    private $container = [];

    /**
     * @param Item $item
     *
     * @return StrategyInterface
     */
    public function get(Item $item): StrategyInterface
    {
        return $this->build(
            $this->retrieveClassName($item->name)
        );
    }

    /**
     * @param string $class
     *
     * @return StrategyInterface
     */
    protected function build(string $class): StrategyInterface
    {
        if (! isset($this->container[$class])) {
            $this->container[$class] = new $class();
        }

        return $this->container[$class];
    }

    /**
     * @param $itemName
     *
     * @return string
     */
    protected function retrieveClassName($itemName): string
    {
        if (isset($this->strategies[$itemName])) {
            return $this->strategies[$itemName];
        }

        return DefaultQualityStrategy::class;
    }
}
