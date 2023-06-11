<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemy extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'enemies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'active',
        'power',
        'agility',
        'created_at',
        'updated_at',
    ];
}
