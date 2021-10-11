<?php

namespace classes;

class Config
{
    public $app = null;

    private static $instance;

    protected function __construct()
    {
        $pathToConfigFolder = __DIR__ . '/../../configs';
        $this->app = parse_ini_file($pathToConfigFolder . "/app.ini", true, INI_SCANNER_TYPED);
    }

    /**
     * @return Config
     */
    public static function get()
    {
        {
            if (!self::$instance)
                self::$instance = new Config();
            return self::$instance;
        }
    }
}