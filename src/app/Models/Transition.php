<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transition extends Model
{
    use HasFactory;

    /**
     * Get the paragraph that owns the transition.
     */
    public function paragraph(): BelongsTo
    {
        return $this->belongsTo(Paragraph::class);
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Transition->value;
    }
}
