<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCafeCategoriesForegein extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cafe_categories', function (Blueprint $table) {
            $table->foreign('cafe_type_id')->references('id')->on('cafe_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cafe_categories', function (Blueprint $table) {
            $table->dropForeign('cafe_type_id');
        });
    }
}
