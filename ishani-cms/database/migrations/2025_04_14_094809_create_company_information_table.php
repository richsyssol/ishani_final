<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->text('company_overview')->nullable();
            $table->string('company_overview_image')->nullable();
            $table->string('manufacturing_facility_header')->nullable();
            $table->text('manufacturing_facility_description')->nullable();
            $table->json('manufacturing_facility_images')->nullable();
            $table->json('manufacturing_facility_images_alt')->nullable();
            $table->json('leadership_team')->nullable(); // Will store JSON array of team members
            $table->json('leadership_team_images_alt')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_information');
    }
};