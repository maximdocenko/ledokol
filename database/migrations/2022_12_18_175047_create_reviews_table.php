<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string("image", 500)->nullable();
            $table->string("name", 500)->nullable();
            $table->string("avatar", 500)->nullable();
            $table->string("author", 500)->nullable();
            $table->longtext("description")->nullable();
            $table->string("url", 500)->nullable();
            $table->string("url_type", 500)->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
