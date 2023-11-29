<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuephong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phong_id')->unsigned();
            $table->integer('khachhang_id')->unsigned();
            $table->dateTime('ngaydat');
            $table->dateTime('ngaytra');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('thuephong');
    }
}