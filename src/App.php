<?php

class App
{
    /** @var Config */
    public $config;

    /**
     * @var Hero
     */
    private $hero;

    /**
     * @var null
     */
    protected static $instance = null;

    /**
     * @return app
     */
    public static function get()
    {
        if (!isset(static::$instance)) {
            static::$instance = new app();
        }
        return static::$instance;
    }

    public function newGame (){
        $this->setHero(new Hero());
    }

    /**
     * @param  Hero  $hero
     */
    public function setHero(Hero $hero): void
    {
        $this->hero = $hero;
    }

    /**
     * @return Hero
     */
    public function getHero() {
        return $this->hero;
    }
}