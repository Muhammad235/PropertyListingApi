<?php

use App\Enums\ListingTypeEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->enum('listing_type', [
                ListingTypeEnum::OPEN->value,
                ListingTypeEnum::SELL->value,
                ListingTypeEnum::EXECUTIVE->value,
                ListingTypeEnum::NET->value,
            ])->default(ListingTypeEnum::OPEN->value);

            $table->string('city');
            $table->string('zip_code');
            $table->string('description');
            $table->string('build_year');
            $table->timestamps();

            $table->foreign('broker_id')
            ->references('id')
            ->on('brokers')
            ->cascadeOnDelete();
            ;


            $table->unique('address', 'zip_code');


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
