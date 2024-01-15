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
        if (!Schema::hasTable('ad_packages')) {
            Schema::create('ad_packages', function (Blueprint $table) {
                $table->id();
                $table->double('price')->nullable();
                $table->integer('period')->nullable();
                $table->enum('type', ['ad', 'panner'])->default('ad');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
