<?php

namespace classes\items;

use classes\app;

class EmptyItem extends Item
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var
     */
    private $name;

    public function __construct()
    {
        $emptyItem = app::get()->config['items'][0];
        $this->setId($emptyItem['id']);
        $this->setName($emptyItem['name']);
    }
}