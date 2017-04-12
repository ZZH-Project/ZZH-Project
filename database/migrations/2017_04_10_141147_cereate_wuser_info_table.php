<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CereateWuserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wuser_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wusername')->nullable();
            $table->string('pic')->nullable();
            $table->string('sex')->nullable();
            $table->integer('wuid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wuser_infos');
    }
}
