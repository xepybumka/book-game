<?php

namespace GameBook\Classes\Facts;

use GameBook\Classes\Config\Config;

abstract class Fact
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
     * @var string
     */
    protected $text;

    public function __construct()
    {
        $fact = Config::getFact($this->name);
        $this->id = $fact['id'];
        $this->text = $fact['text'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}