<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQaCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qa_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qa_id');
            $table->integer('user_id');
            $table->integer('comment_id')->default(0)->nullable();
            $table->string('content');
            $table->integer('good_num')->default(0)->nullable();
            $table->tinyInteger('is_show')->default(1)->nullable();
            $table->bigInteger('issue_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qa_comments');
    }
}
