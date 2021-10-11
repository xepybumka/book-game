<?php

namespace GameBook\Classes\Config;

//TODO:: Конфиг выступает в роли базы данных. Необходимо настроить работу как с базой данных
class Config
{
    private static $stats = [
        2 => ['dexterity' => 8, 'power' => 22, 'charisma' => 8],
        3 => ['dexterity' => 10, 'power' => 20, 'charisma' => 6],
        4 => ['dexterity' => 12, 'power' => 16, 'charisma' => 5],
        5 => ['dexterity' => 9, 'power' => 18, 'charisma' => 8],
        6 => ['dexterity' => 11, 'power' => 20, 'charisma' => 6],
        7 => ['dexterity' => 9, 'power' => 20, 'charisma' => 7],
        8 => ['dexterity' => 10, 'power' => 16, 'charisma' => 7],
        9 => ['dexterity' => 8, 'power' => 24, 'charisma' => 7],
        10 => ['dexterity' => 9, 'power' => 22, 'charisma' => 6],
        11 => ['dexterity' => 10, 'power' => 18, 'charisma' => 7],
        12 => ['dexterity' => 11, 'power' => 20, 'charisma' => 5]
    ];
    private static $items = [
        0 => ['id' => 0,'name' => 'Пусто']
    ];
    private static $weapons = [
        0 => ['id' => 0,'name' => 'Меч', 'damage' => 2]
    ];
    private static $facts = [
        0 => ['id' => 0,'name' => 'Ничего', 'text' => 'Ничего']
    ];

    /**
     * @param  int  $diceResult
     * @return int[]
     *
     * @throws \Exception
     */
    public static function getStats(int $diceResult) {
        if (array_key_exists($diceResult, self::$stats)) {
            return self::$stats[$diceResult];
        } else {
            throw new \Exception('Параметров с результатом кубиков"' . $diceResult . '" не существует!' );
        }
    }


    public static function getItem(string $name) {
        if (in_array($name, array_column(self::$items, 'name'))) {
            $key = array_search($name, array_column(self::$items, 'name'));
            return self::$items[$key];
        } else {
            throw new \Exception('Предмета "' . $name . '" не существует!' );
        }
    }


    public static function getWeapon(string $name) {
        if (in_array($name, array_column(self::$weapons, 'name'))) {
            $key = array_search($name, array_column(self::$weapons, 'name'));
            return self::$weapons[$key];
        } else {
            throw new \Exception('Оружия "' . $name . '" не существует!' );
        }
    }

    public static function getFact(string $name) {
        if (in_array($name, array_column(self::$facts, 'name'))) {
            $key = array_search($name, array_column(self::$facts, 'name'));
            return self::$facts[$key];
        } else {
            throw new \Exception('Факта/информации "' . $name . '" не существует!' );
        }
    }
}