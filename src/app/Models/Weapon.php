<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'power',
        'created_at',
        'updated_at',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Weapon->value;
    }
}
