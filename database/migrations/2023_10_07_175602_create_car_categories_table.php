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
        if (!Schema::hasTable('car_categories')) {
            Schema::create('car_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name_ar')->nullable();
                $table->string('name_en')->nullable();
                $table->unsignedBigInteger('car_type_id')->nullable();
                $table->foreign('car_type_id')->on('car_types')->references('id')->onDelete('cascade');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_categories');
    }
};