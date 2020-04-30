<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5ea9660aa605dMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('menus');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->increments('id');
                $table->string('menu')->nullable();
                $table->string('link')->nullable();
                
                $table->timestamps();
                
            });
        }
    }
}
