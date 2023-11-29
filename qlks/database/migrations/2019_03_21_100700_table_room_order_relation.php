<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRoomOrderRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datphong', function (Blueprint $table) {
            $table->foreign('phong_id')->references('id')
                ->on('phong')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('khachhang_id')->references('id')
                ->on('khachhang')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitietdatphong', function (Blueprint $table) {
            //
            $table->dropForeign(['phong_id']);
            $table->dropForeign(['datphong_id']);
        });
    }
}
