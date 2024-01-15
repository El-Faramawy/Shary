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
        if (!Schema::hasTable('favourates')) {
            Schema::create('favourates', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id')->nullable();
                $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('product_comment_id')->nullable();
                $table->foreign('product_comment_id')->on('product_comments')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('product_reply_id')->nullable();
                $table->foreign('product_reply_id')->on('product_replies')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourates');
    }
};
