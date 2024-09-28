<?php

namespace App\Models;

use App\Enums\EnemyAttackTypeEnum;
use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemy extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'power',
        'enemy_attack_type',
        'attack_power',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'enemy_attack_type' => EnemyAttackTypeEnum::class
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Enemy->value;
    }
}
