<?php

namespace GameBook\Classes\Helpers;

class PathHelper
{
    public static function getSrcPath() {
        $pathUp = '..' . DIRECTORY_SEPARATOR;
        $fileDirPath = __DIR__ . DIRECTORY_SEPARATOR . $pathUp . $pathUp ;
        return $fileDirPath . DIRECTORY_SEPARATOR;
    }

    public static function getConfigDirPath() {
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;
    }

    public static function getTemplateDirPath() {
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;
    }

    public static function getClassesDirPath() {
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . 'classes' . DIRECTORY_SEPARATOR;
    }
}