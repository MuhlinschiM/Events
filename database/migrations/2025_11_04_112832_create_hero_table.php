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
        Schema::create('hero', function (Blueprint $table) {
            $table->id();
            $table->string("name_en", 150);
            $table->string("name_ro", 150);
            $table->string("name_ru", 150);
            $table->string("slug_en", 50)->unique();
            $table->string("slug_ro", 50)->unique();
            $table->string("slug_ru", 50)->unique();
            $table->decimal("price", 16, 2);           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero');
    }
};
