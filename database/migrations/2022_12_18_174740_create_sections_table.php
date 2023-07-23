<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("name", 500)->nullable();
            $table->string("slug", 500)->unique();
            $table->longtext("description")->nullable();
            $table->longtext("content")->nullable();
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
        Schema::dropIfExists('sections');
    }
}
