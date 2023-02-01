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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->integer('post_user_id')->nullable();
            $table->string('cargo_type', 20)->nullable();
            $table->string('date_to_be_send', 20)->nullable();
            $table->text('cargo_description')->nullable();
            $table->text('image_url')->nullable();
            $table->string('delivery_fee', 20)->nullable();
            $table->string('from_location', 30)->nullable();
            $table->string('to_location', 30)->nullable();
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
        Schema::dropIfExists('cargos');
    }
};
