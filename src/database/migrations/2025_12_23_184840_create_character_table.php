<?php

use App\Enums\TableNameEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableNameEnum::Character->value, function (Blueprint $table) {
            $table->id();

            // Основные характеристики
            $table->unsignedTinyInteger('dexterity')->default(0)->comment('Ловкость');
            $table->unsignedTinyInteger('strength')->default(0)->comment('Сила');
            $table->unsignedTinyInteger('charm')->default(0)->comment('Сила');
            $table->unsignedTinyInteger('mind_power')->default(0)->comment('Сила мысли');

            // Ресурсы
            $table->unsignedSmallInteger('gold')->default(0)->comment('Золото');
            $table->unsignedSmallInteger('food')->default(0)->comment('Еда');

            // Стартовые/максимальные значения
            $table->json('base_stats')->comment('Стартовые параметры');

            $table->foreignId('weapon_id')->constrained();

            $table->string('current_location')->nullable()->comment('Последняя локация');
            $table->unsignedInteger('current_paragraph')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameEnum::Character->value);
    }
};
