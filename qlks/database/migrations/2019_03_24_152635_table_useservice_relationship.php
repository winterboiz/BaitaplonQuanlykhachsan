<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUseserviceRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sudungdichvu', function (Blueprint $table) {
            $table->foreign('dichvu_id')->references('id')
                ->on('dichvu')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('thuephong_id')->references('id')
                ->on('thuephong')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')
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
        Schema::table('sudungdichvu', function (Blueprint $table) {
            $table->dropForeign(['dichvu_id']);
            $table->dropForeign(['thuephong_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
