<?php

namespace GameBook\Classes\Helpers;

class PathHelper
{
    const BOOK_FOLDER = 'Books';
    const PAGES_FOLDER = 'pages';
    const CONFIG_FOLDER = 'Config';
    const TEMPLATES_FOLDER = 'templates';
    const CLASSES_FOLDER = 'templates';

    public static function getSrcPath() {
        $fileDirPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';
        return $fileDirPath . DIRECTORY_SEPARATOR;
    }

    public static function getConfigDirPath() {
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . DIRECTORY_SEPARATOR .  self::CONFIG_FOLDER . DIRECTORY_SEPARATOR;
    }

    public static function getTemplateDirPath() {
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . DIRECTORY_SEPARATOR . self::TEMPLATES_FOLDER . DIRECTORY_SEPARATOR;
    }

    public static function getClassesDirPath() {
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . self::CLASSES_FOLDER . DIRECTORY_SEPARATOR;
    }

    public static function getBookPath(){
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . self::BOOK_FOLDER . DIRECTORY_SEPARATOR;
    }

    public static function getPagesPath(){
        $srcDirPath = self::getSrcPath();
        return $srcDirPath . self::PAGES_FOLDER . DIRECTORY_SEPARATOR;
    }
}