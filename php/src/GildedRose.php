<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Factories\QualityStrategyFactory;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;
    /**
     * @var QualityStrategyFactory
     */
    private $qualityStrategyFactory;

    /**
     * GildedRose constructor.
     *
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
        $this->qualityStrategyFactory = new QualityStrategyFactory();
    }

    /**
     *
     */
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->updateItemQuality($item);
            $this->updateItemSellIn($item);
        }
    }

    /**
     * @param Item $item
     */
    protected function updateItemQuality(Item $item)
    {
        $strategy = $this->getQualityStrategy($item);
        $strategy->apply($item);
    }

    /**
     * @param Item $item
     *
     * @return Strategies\StrategyInterface
     */
    protected function getQualityStrategy(Item $item): Strategies\StrategyInterface
    {
        return $this->qualityStrategyFactory->get($item);
    }

    private function updateItemSellIn($item)
    {
        $item->name !== 'Sulfuras, Hand of Ragnaros' && $item->sell_in--;
    }
}
