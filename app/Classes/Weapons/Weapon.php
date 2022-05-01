<?php

namespace GameBook\Classes\Weapons;

use GameBook\Classes\Config\Config;

abstract class Weapon
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $damage;

    public function __construct()
    {
        $swordConfig = Config::getWeapon($this->name);
        $this->id = $swordConfig['id'];
        $this->damage = $swordConfig['damage'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }
}