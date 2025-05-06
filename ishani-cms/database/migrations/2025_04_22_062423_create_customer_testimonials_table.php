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
       Schema::create('customer_testimonials', function (Blueprint $table) {
    $table->id();
    $table->text('quote');
    $table->string('name');
    $table->string('location');
     $table->tinyInteger('rating')
                  ->unsigned()
                  ->default(5);
    $table->integer('order')->default(0);
    $table->boolean('is_visible')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_testimonials');
    }
};
