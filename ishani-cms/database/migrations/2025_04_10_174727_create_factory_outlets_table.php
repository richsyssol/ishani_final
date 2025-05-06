<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('factory_outlets', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->text('text_content');
            $table->string('location_line_1');
            $table->string('location_line_2')->nullable();
            $table->string('location_line_3')->nullable();
            $table->string('location_line_4')->nullable();
            $table->string('opening_hours_line_1');
            $table->string('opening_hours_line_2')->nullable();
            $table->string('contact_number');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factory_outlets');
    }
};