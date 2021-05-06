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
        // blog table
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('author_id');
        $table->foreign('author_id')
          ->references('id')->on('users')
          ->onDelete('cascade');
        $table->string('title')->unique();
        $table->text('body');
        $table->string('slug')->unique();
        $table->boolean('active');
        $table->timestamps();
        $table->string('name')->nullable();
        $table->string('path')->nullable();
        $table->string('blog_thumbnail')->nullable();

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
