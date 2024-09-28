<?php

namespace Database\Seeders;

use App\Enums\EnemyAttackTypeEnum;
use App\Enums\TableNameEnum;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnemySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(TableNameEnum::Enemy->value)->insert([
            'id' => 1,
            'name' => "Какой-то монстр",
            'power' => 12,
            'attack_power' => 11,
            'enemy_attack_type' => EnemyAttackTypeEnum::Agility->value,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
