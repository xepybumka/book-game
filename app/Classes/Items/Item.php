<?php

namespace GameBook\Classes\Items;

use GameBook\Classes\Config\Config;

abstract class Item
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    public function __construct()
    {
        $item = Config::getItem($this->name);
        $this->id = $item['id'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}