<?php


namespace classes;

class Sword extends Weapon
{
    public function __construct()
    {
        $sword = app::get()->config['sword'];
        $this->name = $sword['name'];
        $this->damage = $sword['damage'];
    }
}