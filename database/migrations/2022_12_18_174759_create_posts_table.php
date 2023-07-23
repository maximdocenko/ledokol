<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("name", 500)->nullable();
            $table->string("slug", 500)->nullable();
            $table->integer("section")->default(0);
            $table->integer("category_id")->default(0);
            $table->longtext("description")->nullable();
            $table->string("image", 500)->nullable();
            $table->longtext("seo_title", 500)->nullable();
            $table->longtext("seo_description")->nullable();
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
        Schema::dropIfExists('posts');
    }
}
