<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCafeRelationsForegein extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cafe_relations', function (Blueprint $table) {
            $table->foreign('cafe_record_id')->references('id')->on('cafe_records');
            $table->foreign('cafe_category_id')->references('id')->on('cafe_categories');
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
        Schema::table('cafe_relations', function (Blueprint $table) {
            $table->dropForeign(['cafe_record_id']);
            $table->dropForeign(['cafe_category_id']);
            $table->dropForeign(['cafe_type_id']);
        });
    }
}
