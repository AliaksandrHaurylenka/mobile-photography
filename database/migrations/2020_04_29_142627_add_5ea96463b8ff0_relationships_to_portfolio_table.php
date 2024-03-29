<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ea96463b8ff0RelationshipsToPortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function(Blueprint $table) {
            if (!Schema::hasColumn('portfolios', 'category_id')) {
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id', '339557_5ea9645e9a322')->references('id')->on('categories')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function(Blueprint $table) {
            
        });
    }
}
