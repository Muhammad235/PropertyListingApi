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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('broker_id');
            $table->string('address');
            $table->enum('listing_type');
            $table->string('city');
            $table->string('zip_code');
            $table->string('description');
            $table->string('build_year');
            $table->timestamps();

            $table->foreign('broker_id')
            ->reference('id')
            ->on()

            ;


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
