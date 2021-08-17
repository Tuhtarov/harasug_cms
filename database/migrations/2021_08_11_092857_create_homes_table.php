<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            //имя юрты для страницы бронирования (там имя по макету отличается)
            $table->string('title_full');
            //слаг определяется по полному имени юрты
            $table->string('slug')->unique();
            $table->string('type')->nullable()->default('юрта');

            $table->text('description')->nullable();
            $table->unsignedSmallInteger('max_peoples')->default(2);
            //vip / не vip
            $table->tinyText('status')->nullable();

            $table->smallInteger('price')->nullable()->unsigned()->default('5000');
            $table->string('price_info')->nullable()->default('цена / ночь');

            $table->softDeletes();
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
        Schema::dropIfExists('homes');
    }
}
