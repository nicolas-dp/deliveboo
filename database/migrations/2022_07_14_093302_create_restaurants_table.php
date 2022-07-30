<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('name', 50);
            $table->string('slug', 100);
            $table->text('description')->nullable();
            $table->string('address');
            $table->decimal('delivery_cost', 6, 2)->default(0);
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->string('phone_number', 50);
            $table->string('cover_image')->nullable();
            $table->string('PIVA', 11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
