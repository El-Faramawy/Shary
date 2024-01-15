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
//        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->index();
                $table->string('image')->nullable();
                $table->text('description')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
                $table->enum('type', ['car', 'building'])->nullable();
                $table->string('publisher_type')->nullable();
                $table->unsignedBigInteger('area_id')->nullable();
                $table->foreign('area_id')->on('areas')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('city_id')->nullable();
                $table->foreign('city_id')->on('cities')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('country_id')->nullable();
                $table->foreign('country_id')->on('countries')->references('id')->onDelete('cascade');
                $table->string('whatsapp')->nullable();
                $table->string('phone')->nullable();
                $table->double('latitude')->nullable();
                $table->double('longitude')->nullable();
                $table->string('address')->nullable();
                $table->string('video')->nullable();
                $table->string('video_cover')->nullable();
                $table->tinyInteger('has_reword')->default(0);
                $table->enum('status', ['pending', 'active', 'inactive'])->default('pending');
                $table->text('inactive_reason')->nullable();
                $table->date('end_date')->nullable();
                $table->integer('day_num')->nullable();
                $table->date('panner_end_date')->nullable();
                $table->tinyInteger('show_comments')->default(1);
                // cars
                $table->unsignedBigInteger('car_type_id')->nullable();
                $table->foreign('car_type_id')->on('car_types')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('car_category_id')->nullable();
                $table->foreign('car_category_id')->on('car_categories')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('car_model_id')->nullable();
                $table->foreign('car_model_id')->on('car_models')->references('id')->onDelete('cascade');
                $table->unsignedBigInteger('car_color_id')->nullable();
                $table->foreign('car_color_id')->on('car_colors')->references('id')->onDelete('cascade');
                $table->string('car_status')->nullable();
                $table->tinyInteger('checked')->default(0); // مفحوصة
                $table->tinyInteger('license')->default(0);
                $table->tinyInteger('body')->default(0);
                $table->double('price')->nullable();
                // building
                $table->enum('street_type', ['public', 'commercial'])->default('public'); // سكنى و تجارى
                $table->string('publisher_number')->nullable();
                $table->enum('building_category', ['home_for_rent', 'home_for_sell', 'land_for_sell', 'store_for_rent', 'store_for_sell'])->nullable();
                $table->string('room_number')->nullable();
                $table->string('bathroom_number')->nullable();
                $table->string('building_area')->nullable();
                $table->string('floor_number')->nullable();
                $table->string('building_age')->nullable();
                $table->string('full_option')->nullable(); // مفروشة
                $table->tinyInteger('building_status')->default(0);
                $table->tinyInteger('has_ad')->default(0);

                $table->timestamps();
            });
//        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
