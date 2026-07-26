<?php

use App\Enums\TableNameEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableNameEnum::CharacterItem->value, function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained(TableNameEnum::Character->value);
            $table->foreignId('item_id')->constrained(TableNameEnum::Item->value);
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameEnum::CharacterItem->value);
    }
};
