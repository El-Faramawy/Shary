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
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('logo')->nullable();
                $table->string('fav_icon')->nullable();
                $table->string('phone')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('commission')->nullable();
                $table->string('twitter')->nullable();
                $table->string('snapchat')->nullable();
                $table->string('insta')->nullable();
                $table->string('tiktok')->nullable();
                $table->text('terms')->nullable();
                $table->text('privacy')->nullable();
                $table->text('about')->nullable();
                $table->string('car_image')->nullable();
                $table->string('building_image')->nullable();
                $table->integer('like_reword')->nullable();
                $table->integer('follow_reword')->nullable();
                $table->integer('min_reward_rate')->nullable();
                $table->double('reword')->default(0)->nullable();
                $table->string('what_verification')->nullable();
                $table->string('how_verification')->nullable();
                $table->string('deleted_action')->nullable();
                $table->string('no_commission')->nullable();
                $table->string('break_low')->nullable();
                $table->string('verification_important')->nullable();
                $table->text('reward_definition')->nullable();

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
