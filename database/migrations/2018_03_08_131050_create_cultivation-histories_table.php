<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultivationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivation-histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('crop');    // content カラム追加
            $table->string('cultivar');    // content カラム追加
            $table->string('place');    // content カラム追加
            $table->dateTime('seeding-day');    // content カラム追加
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
        Schema::drop('cultivation-histories');
    }
}
