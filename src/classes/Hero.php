<?php

namespace GameBook\Classes;

use GameBook\Classes\Common\Note;
use GameBook\Classes\Config\Config;
use GameBook\Classes\Weapons\Sword;
use GameBook\Classes\Weapons\Weapon;

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
     * @var Note
     */
    private $note;

    /**
     * @var Weapon
     */
    private $weapon;

    /**
     * Hero constructor.
     * @param  int  $diceResult
     */
    public function __construct(int $diceResult = 0) {
        if (!$diceResult) {
            $diceResult = Dice::throwTwoDices();
        }
        $this->createHero($diceResult);
        $this->setStats($diceResult);
        $this->setWeapon(new Sword());
        $this->setFood(3);
        $this->setMoney(0);
        $this->setBag(new Bag());
    }

    /**
     * @param  int  $diceResult
     */
    private function createHero(int $diceResult) {
        $this->setStats($diceResult);
        $this->setWeapon(new Sword());
        $this->setFood(3);
        $this->setMoney(0);
        $this->setBag(new Bag());
        $this->setNote(new Note());
    }

    /**
     * @param $diceResult int
     */
    private function setStats(int $diceResult) {
        $startParams = Config::getStats($diceResult);
        $this->dexterity = $startParams['dexterity'];
        $this->power = $startParams['power'];
        $this->charisma = $startParams['charisma'];
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param  int  $power
     */
    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * @param  int  $dexterity
     */
    public function setDexterity(int $dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return int
     */
    public function getCharisma(): int
    {
        return $this->charisma;
    }

    /**
     * @param  int  $charisma
     */
    public function setCharisma(int $charisma): void
    {
        $this->charisma = $charisma;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * @param  int  $money
     */
    public function setMoney(int $money): void
    {
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @param  int  $food
     */
    public function setFood(int $food): void
    {
        $this->food = $food;
    }

    /**
     * @return Bag
     */
    public function getBag(): Bag
    {
        return $this->bag;
    }

    /**
     * @param  Bag  $bag
     */
    public function setBag(Bag $bag): void
    {
        $this->bag = $bag;
    }

    /**
     * @return Note
     */
    public function getNote(): Note
    {
        return $this->note;
    }

    /**
     * @param  Note  $note
     */
    public function setNote(Note $note): void
    {
        $this->note = $note;
    }

    /**
     * @return Weapon
     */
    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    /**
     * @param  Weapon  $weapon
     */
    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }
}