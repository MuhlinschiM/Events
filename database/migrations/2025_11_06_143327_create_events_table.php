<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ro');
            $table->string('title_ru');

            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->string('slug_en')->unique();
            $table->string('slug_ro')->unique();
            $table->string('slug_ru')->unique();

            $table->date('date_event');
            $table->time('time_event');

            $table->string('location_en');
            $table->string('location_ro');
            $table->string('location_ru');

            $table->string('image')->nullable();

            $table->decimal('price', 10, 2)->default(0);

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
