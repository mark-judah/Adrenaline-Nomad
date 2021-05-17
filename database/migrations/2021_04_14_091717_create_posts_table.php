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
        $table->string('slug')->unique();
        $table->boolean('active');
        $table->timestamps();
        $table->string('blog_thumbnail')->nullable();

      });
      DB::statement("ALTER TABLE posts ADD body LONGBLOB");

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
