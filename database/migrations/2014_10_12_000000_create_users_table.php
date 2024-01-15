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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->index();
                $table->string('user_name')->unique()->nullable()->index();
                $table->string('phone_code')->nullable();
                $table->string('phone')->unique();
                $table->string('code')->nullable();
                $table->string('password');
                $table->string('email')->nullable();
                $table->string('email_verified')->nullable();
                $table->string('image')->nullable();
                $table->unsignedBigInteger('country_id')->nullable();
                $table->foreign('country_id')->on('countries')->references('id')->onDelete('cascade');
                $table->tinyInteger('verified')->nullable();
                $table->double('commission')->default(0);
                $table->double('wallet')->default(0);
                $table->enum('block', ['yes', 'no'])->default('no');
                $table->enum('has_notification', ['yes', 'no'])->default('yes');
                $table->enum('from_sa', ['yes', 'no'])->default('yes');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
