<?php

namespace GameBook\Classes\Enemies;

use GameBook\Classes\Config\Config;

abstract class Enemy
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $damage;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $dexterity;

    /**
     * @var int
     */
    protected $power;

    public function __construct()
    {
        $enemy = Config::getEnemy($this->name);
        $this->id = $enemy['id'];
        $this->dexterity = $enemy['dexterity'];
        $this->power = $enemy['power'];
    }
}