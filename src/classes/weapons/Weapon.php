<?php

namespace classes;

class Weapon
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $damage;

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