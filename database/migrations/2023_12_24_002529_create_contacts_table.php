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
        if (!Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('contact_category_id')->nullable();
                $table->foreign('contact_category_id')->on('contact_categories')->references('id')->onDelete('cascade');
                $table->text('question_ar')->nullable();
                $table->text('question_en')->nullable();
                $table->text('answer_ar')->nullable();
                $table->text('answer_en')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
