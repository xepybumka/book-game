<?php

namespace GameBook\Classes;

use GameBook\Classes\Items\EmptyItem;
use GameBook\Classes\Items\Item;

class Bag
{
    /**
     * @var array[]
     */
    private $items = [];

    public function __construct()
    {
        for ($i = 1; $i <= 7; $i++) {
            $this->setItem($this->getEmptyItem(), $i);
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param  int  $position
     */
    public function dropItem(int $position) {
        $this->items[$position] = $this->getEmptyItem();
    }


    public function putItem(Item $item) {
        if ($this->hasEmtpySlot()) {
            $emptyItem = $this->getEmptyItem();
            $key = array_search($emptyItem->getId(), array_column($this->items, 'id'));
            $this->setItem($item, $key);
        }
    }

    private function hasEmtpySlot() {
        return in_array($this->getEmptyItem(), $this->items);
    }

    private function getEmptyItem() {
        return new EmptyItem();
    }

    /**
     * @param  Item  $item
     * @param  int  $position
     */
    private function setItem(Item $item, int $position)
    {
        $this->items[$position] = $item;
    }
}