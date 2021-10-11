<?php

namespace classes;

class Hero
{
    /**
     * @var int
     */
    private $power;

    /**
     * @var int
     */
    private $dexterity;

    /**
     * @var int
     */
    private $charisma;

    /**
     * @var int
     */
    private $money;

    /**
     * @var int
     */
    private $food;

    /**
     * @var Bag
     */
    private $bag;

    /**
     * @var array
     */
    private $information;

    /**
     * @var Weapon
     */
    private $weapon;

    public function __construct() {
        $this->createHero();
    }

    private function createHero() {
        $diceResult = Dice::throwTwoDices();
        $this->setStats($diceResult);
        $this->setWeapon(new Sword());
        $this->setFood(3);
        $this->setMoney(0);
        $this->setBag(new Bag());
    }

    /**
     * @param $diceResult int
     */
    private function setStats(int $diceResult) {
        $startParams = app::get()->config['startParam'][$diceResult];
        $this->dexterity = $startParams['dexterity'];
        $this->power = $startParams['power'];
        $this->charisma = $startParams['charisma'];
    }

    /**
     * @param  Weapon  $weapon
     */
    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }


    /**
     * @param  int  $food
     */
    public function setFood(int $food): void
    {
        $this->food = $food;
    }

    /**
     * @param  int  $money
     */
    public function setMoney(int $money): void
    {
        $this->money = $money;
    }

    /**
     * @param  Bag  $bag
     */
    public function setBag(Bag $bag): void
    {
        $this->bag = $bag;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @return Bag
     */
    public function getBag(): Bag
    {
        return $this->bag;
    }

    /**
     * @return array
     */
    public function getInformation(): array
    {
        return $this->information;
    }

    /**
     * @return Weapon
     */
    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }
}