<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafeRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafe_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cafe_record_id')->unique();
            $table->unsignedInteger('cafe_category_id');
            $table->unsignedInteger('cafe_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafe_relations');
    }
}
