<?php

use App\Enums\TableNameEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableNameEnum::Transition->value, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paragraph_number')->comment('Номер параграфа, в котором этот переход');
            $table->foreign('paragraph_number')->references('number')->on(TableNameEnum::Paragraph->value);
            $table->unsignedBigInteger('to_paragraph_number')->comment('Идентификатор параграфа, на который ссылается этот переход');
            $table->foreign('to_paragraph_number')->references('number')->on(TableNameEnum::Paragraph->value);
            $table->text('title')->comment('Как в тексте будет отображаться переход');
            $table->dateTime('created_at')->comment('Дата добавления');
            $table->dateTime('updated_at')->comment('Дата редактирования');
            $table->index(['id', 'paragraph_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableNameEnum::Transition->value);
    }
};
