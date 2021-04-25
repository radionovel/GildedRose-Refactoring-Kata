<?php


namespace GildedRose\Strategies;


use GildedRose\Item;

interface StrategyInterface
{
    public function apply(Item $item);
}