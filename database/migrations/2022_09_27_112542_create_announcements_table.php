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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('announcement_title')->nullable();
            $table->string('announcement_category', 30)->nullable();
            $table->text('announcement_description')->nullable();
            $table->text('image_url')->nullable();
            $table->string('address_link')->nullable();
            $table->integer('post_created_by_id')->nullable();
            $table->integer('viewed_number')->nullable();
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
        Schema::dropIfExists('announcements');
    }
};
