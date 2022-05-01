<?php

namespace GameBook\Classes\Common;

use GameBook\Classes\Config\Config;
use GameBook\Classes\Helpers\PathHelper;
use Tizis\FB2\FB2Controller;
use Tizis\FB2\Model\Chapter;

class Game
{
    private Character $character;

    private Dice $dice;

    private int $lastDiceResult;

    private FB2Controller $bookReader;

    public function __construct() { }

    public function newGame() {
        $this->dice = new Dice();
        $this->lastDiceResult = $this->dice::throwTwoDices();
        $this->character = new Character($this->lastDiceResult);
        $this->setNewBook();
    }

    public function getCharacter()
    {
        return $this->character;
    }

    public function getBookReader() {
        return $this->bookReader;
    }

    private function setNewBook($bookName = 'Повелитель Безбрежной Пустыни')
    {
        $bookPath = Config::getBookFilePath($bookName);
        $file = file_get_contents($bookPath);
        $this->bookReader = new FB2Controller($file);
        $this->bookReader->startParse();
    }

    public function getPage(int $page)
    {
        $chapters = $this->bookReader->getBook()->getChapters();
        /** @var Chapter $currentChapter */
        $currentChapter = $chapters[$page];
        $page = new Page(
            $currentChapter->getTitle(),
            $currentChapter->getContent()
        );
        return $page;
    }

    public function getStartPage()
    {
        $title = 'Ваш персонаж успешно создан!';
        $content = file_get_contents(PathHelper::getTemplateDirPath() . '/pages/start_page.php');
        $diceResult = $this->lastDiceResult;
        $startStats = Config::getStats($diceResult);
        $content = str_replace('%diceResult%', $diceResult, $content);
        $content = str_replace('%dexterity%', $startStats['dexterity'], $content);
        $content = str_replace('%power%', $startStats['power'], $content);
        $content = str_replace('%charisma%', $startStats['charisma'], $content);
        $page = new Page(
            $title,
            $content
        );
        return $page;
    }
}