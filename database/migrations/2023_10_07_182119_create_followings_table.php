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
        if (!Schema::hasTable('followings')) {
            Schema::create('followings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id')->nullable();
                $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('follower_user_id')->nullable(); // me follow other one
                $table->foreign('follower_user_id')->on('users')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('following_user_id')->nullable(); // other one who i follow
                $table->foreign('following_user_id')->on('users')->references('id')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followings');
    }
};
