<?php

namespace App\Models;

use App\Enums\EventTypeEnum;
use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'text',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'enemy_attack_type' => EventTypeEnum::class
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Event->value;
    }
}
