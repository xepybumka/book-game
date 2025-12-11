<?php

use App\Enums\ParagraphTypeEnum;
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
        Schema::create(TableNameEnum::Paragraph->value, function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique()->comment('Номер параграфа');
            $table->text('text')->comment('Текст параграфа');
            $table->integer('type')->default(ParagraphTypeEnum::Text)->comment('Тип параграфа (text/html');
            $table->dateTime('created_at')->comment('Дата добавления');
            $table->dateTime('updated_at')->comment('Дата редактирования');
            $table->index(['id', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableNameEnum::Paragraph->value);
    }
};
