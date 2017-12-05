<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(!Schema::hasTable('post_tag')) {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->reference('id')->on('posts');

            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->reference('id')->on('tags');
            $table->timestamps();
        });

    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
