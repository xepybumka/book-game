<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paragraph extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'number',
        'text',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the transitions for the paragraph.
     */
    public function transitions(): HasMany
    {
        return $this->hasMany(ParagpaphTransition::class, 'paragraph_number', 'number');
    }

    /**
     * Get the items for the paragraph.
     */
    public function items(): HasMany
    {
        return $this->hasMany(ParagpaphTransition::class, 'paragraph_number', 'number');
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Paragraph->value;
    }
}
