<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sudungdichvu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thuephong_id')->unsigned()->nullable();
            $table->integer('dichvu_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('quantity')->default(1)->unsigned();
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
        Schema::dropIfExists('sudungdichvu');
    }
}
