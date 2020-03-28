<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('post_id');
            $table->string('title');
            $table->longText('content');
            $table->string('category');
            $table->integer('view')->default(0);
            $table->integer('share')->default(0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('user_id')->unsigned();
            // $table->bigInteger('post_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('post_id')->references('id')->on('posts');
            // $table->timestamps();
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
