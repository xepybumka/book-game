<?php

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
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->unique();
            $table->string('text');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->index(['id', 'position']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paragraphs');
    }
};