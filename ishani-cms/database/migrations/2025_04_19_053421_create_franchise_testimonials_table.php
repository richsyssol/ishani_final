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
        Schema::create('franchise_testimonials', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('location');
    $table->text('quote');
    $table->unsignedTinyInteger('rating')->default(5);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise_testimonials');
    }
};
