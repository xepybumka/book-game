<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParagraphItem extends Model
{
    use HasFactory;

    /**
     * Вернет предмет
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::ParagraphItem->value;
    }
}
