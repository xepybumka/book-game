<?php

use App\Enums\EnemyAttackTypeEnum;
use App\Enums\TableNameEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private string $tableName = 'enemies';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableNameEnum::Enemy->value, function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название противника');
            $table->integer('power')->comment('Сила противника');
            $table->enum(
                'enemy_attack_type',
                array_column(EnemyAttackTypeEnum::cases(), 'value')
            )
                ->default(EnemyAttackTypeEnum::Agility->value)
                ->comment(' ID типа атаки противника (Ловкость/Сила мысли)');
            $table->integer('attack_power')->comment('Сила атаки противника');
            $table->dateTime('created_at')->comment('Дата добавления');
            $table->dateTime('updated_at')->comment('Дата редактирования');
            $table->index(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableNameEnum::Enemy->value);
    }
};
