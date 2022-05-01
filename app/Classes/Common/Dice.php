<?php

namespace GameBook\Classes\Common;

class Dice
{
    /**
     * @return int
     */
    public static function throwDice() {
        return rand(1, 6);
    }

    /**
     * @return int
     */
    public static function throwTwoDices() {
        return self::throwDice() + self::throwDice();
    }
}