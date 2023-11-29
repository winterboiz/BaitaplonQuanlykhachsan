<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuvienhinhanh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type'); // Image hoặc Attachment
            $table->string('mime');
            $table->string('path');
            $table->integer('phong_id')->unsigned()->nullable();
            $table->foreign('phong_id')->references('id')->on('phong')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::table('thuvienhinhanh', function (Blueprint $table) {
            $table->dropForeign(['phong_id']);
        });
        Schema::dropIfExists('thuvienhinhanh');
    }
}
