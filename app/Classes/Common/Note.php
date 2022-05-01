<?php

namespace GameBook\Classes\Common;

use GameBook\Classes\Facts\EmptyFact;
use GameBook\Classes\Facts\Fact;

class Note
{
    /**
     * @var Fact[]
     */
    private $notes = [];

    public function __construct()
    {
        $this->notes[] = new EmptyFact();
        $this->notes[] = new EmptyFact();
        $this->notes[] = new EmptyFact();
    }

    /**
     * @return Fact[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * @param  Fact[]  $notes
     */
    public function setNotes(array $notes): void
    {
        $this->notes = $notes;
    }
}