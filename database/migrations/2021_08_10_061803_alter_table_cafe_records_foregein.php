<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCafeRecordsForegein extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cafe_records', function (Blueprint $table) {
            $table->foreign('cafe_category_id')->references('id')->on('cafe_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cafe_records', function (Blueprint $table) {
            $table->dropForeign('cafe_category_id');
        });
    }
}
