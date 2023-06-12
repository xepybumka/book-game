<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'notes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'text',
        'active',
        'created_at',
        'updated_at',
    ];
}
