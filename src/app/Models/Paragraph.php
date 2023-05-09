<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'paragraphs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'position',
        'text',
        'active',
        'created_at',
        'updated_at',
    ];
}
