<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housings', function (Blueprint $table) {
            $table->id();
            $table->string('house_type')->nullable();
            $table->string('house_options')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('image_url')->nullable();
            $table->string('rent_price', 15)->nullable();
            $table->string('location')->nullable();
            $table->integer('post_id')->nullable();
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
        Schema::dropIfExists('housings');
    }
};
