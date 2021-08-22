<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //id, on_blog, from_user, body, at_time
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('on_post');
        $table->string('name');
        //$table->unsignedBigInteger('from_user');
        $table->foreign('on_post')
          ->references('id')->on('posts')
          ->onDelete('cascade');
        // $table->foreign('from_user')
        //   ->references('id')->on('users')
        //   ->onDelete('cascade');
        $table->text('body');

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
        Schema::dropIfExists('comments');
    }
}
