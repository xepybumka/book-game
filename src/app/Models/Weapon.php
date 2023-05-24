<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'weapons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'power',
        'active',
        'created_at',
        'updated_at',
    ];
}
