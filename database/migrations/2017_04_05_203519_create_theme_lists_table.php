<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->nullable();
            $table->integer('auser_id')->nullable();
            $table->string('title')->nullable();
            $table->string('banner_img')->nullable();
            $table->text('content')->nullable();
            $table->integer('good_num')->nullable();
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
