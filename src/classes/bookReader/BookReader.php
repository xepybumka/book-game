<?php

namespace GameBook\Classes\BookReader;

use GameBook\Classes\Helpers\PathHelper;

class BookReader
{
    /**
     * @var string
     */
    private $currentPage;

    /**
     * @var string
     */
    private $cuttentCategory;

    /**
     * @param  string  $pageName
     * @param  string  $categoryName
     * @throws \Exception
     */
    public function goTo(string $pageName, string $categoryName) {
        $categoryPath = PathHelper::getSrcPath() . DIRECTORY_SEPARATOR . $categoryName;
        $filePath = $categoryPath . DIRECTORY_SEPARATOR . $pageName;
        if (is_dir($categoryPath) && file_exists($filePath)) {
            $_SESSION['category_name'] = $pageName;
            $_SESSION['page_name'] = $categoryName;
        } else {
            throw new \Exception('Категории "' . $categoryName . '" или страницы "' . $pageName . '" не существует!' );
        }
    }
}