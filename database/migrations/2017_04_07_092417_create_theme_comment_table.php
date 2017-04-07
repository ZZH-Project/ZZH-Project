<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('th_id')->nullable();
            $table->integer('wuser_id')->nullable();
            $table->integer('comment_id')->nullable();
            $table->text('content')->nullable();
            $table->integer('is_show')->nullable();
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
        //
    }
}
