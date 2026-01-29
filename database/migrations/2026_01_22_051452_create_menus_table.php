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
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->text('description')->nullable();
        $table->integer('price');
        $table->string('image')->nullable();

        $table->boolean('is_featured')->default(false);
        $table->boolean('is_popular')->default(false);
        $table->boolean('is_new')->nullable();

        $table->decimal('rating', 2, 1)->default(0);
        $table->integer('review_count')->default(0);
        $table->integer('calories')->nullable();
        $table->integer('prepation_time')->nullable();

        $table->longText('ingredients')->nullable();
        $table->longText('customizations')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('menus');
}

};