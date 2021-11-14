<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id");
            $table->string("title");
            $table->string("slug");
            $table->string("short_description")->nullable();
            $table->longText("description")->nullable();
            $table->integer("banner")->nullable();
            $table->string("meta_title")->nullable();
            $table->integer("meta_img")->nullable();
            $table->string("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();
            $table->integer("status")->defauult(1);
            $table->timestamps();
            $table->softDeletes("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
