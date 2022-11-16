<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    /** @var string[] */
    private array $rules;

    public function __construct(array $attributes = [])
    {
        $this->setRules();
        parent::__construct($attributes);
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    private function setRules(): void
    {
        $rules = [];
        $rulesJson = file_get_contents('../database/sources/rules.json');
        if ($rulesJson) {
            foreach (json_decode($rulesJson) as $paragraph) {
                $rules[] = [
                    'title' => $paragraph->title,
                    'text' => $paragraph->text
                ];
            }
        }
        $this->rules = $rules;
    }
}
