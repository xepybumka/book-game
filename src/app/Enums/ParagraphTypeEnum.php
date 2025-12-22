<?php

namespace App\Enums;

enum ParagraphTypeEnum: int
{
    case Text = 1;
    case Html = 2;

    public static function isText(int $type): bool
    {
        return $type == self::Text;
    }
}
