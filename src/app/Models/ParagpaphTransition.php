<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParagpaphTransition extends Model
{
    use HasFactory;

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::ParagraphTransition->value;
    }
}
