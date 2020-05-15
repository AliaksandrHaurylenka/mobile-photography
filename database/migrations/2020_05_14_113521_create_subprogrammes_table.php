<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubprogrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subprogrammes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            //создание поля для связывания с таблицей programs
            $table->integer('program_id')->unsigned()->default(1);
            //создание внешнего ключа для поля 'user_id', который связан с полем id таблицы 'programs'
            $table->foreign('program_id')->references('id')->on('programs');


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
        Schema::dropIfExists('subprogrammes');
    }
}
