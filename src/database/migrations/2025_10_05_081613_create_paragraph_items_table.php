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
        Schema::create(TableNameEnum::ParagraphItem->value, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paragraph_number')->comment('Номер параграфа, в котором находится предмет');
            $table->foreign('paragraph_number')->references('number')->on(TableNameEnum::Paragraph->value);
            $table->unsignedBigInteger('item_id')->comment('Идентификатор предмета');
            $table->foreign('item_id')->references('id')->on(TableNameEnum::Item->value);
            $table->text('title')->comment('Наименование предмета в тексте');
            $table->dateTime('created_at')->comment('Дата добавления');
            $table->dateTime('updated_at')->comment('Дата редактирования');
            $table->index(['id', 'paragraph_number', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableNameEnum::ParagraphItem->value);
    }
};
