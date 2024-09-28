<?php

use App\Enums\TableNameEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableNameEnum::Item->value, function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название предмета');
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
        Schema::dropIfExists(TableNameEnum::Item->value);
    }
};
