<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Item->value;
    }
}
