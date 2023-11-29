<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenkhachhang')->unique();
            $table->string('cmnd');
            $table->string('diachi');
            $table->string('dienthoai');
            $table->integer('gioitinh')->nullable();
            $table->string('quoctich')->nullable();
            $table->string('username')->nullable();
            $table->string('passwork')->nullable();
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
        Schema::dropIfExists('khachhang');
    }
}
