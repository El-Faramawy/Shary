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
        if (!Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('product_id')->nullable();
                $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');
                $table->string('title')->nullable();
                $table->string('message')->nullable();
                $table->enum('type', ['favorite', 'comment', 'reply', 'accept_product', 'cancel_product', 'pending_product'])->nullable();
                $table->tinyInteger('is_read')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
