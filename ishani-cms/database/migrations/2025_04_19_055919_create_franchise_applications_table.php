<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('franchise_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('preferred_city');
            $table->enum('investment_capacity', [
                '10-20 lakhs',
                '20-30 lakhs',
                '30-40 lakhs',
                '40-50 lakhs',
                '50+ lakhs'
            ]);
            $table->text('business_experience')->nullable();
            $table->boolean('consent_marketing')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise_applications');
    }
};
