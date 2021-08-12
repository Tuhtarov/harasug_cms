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
            //по этому слагу будет определяться страница с описанием этой сущности
            $table->string('slug')->unique();
            //тут я посчитал нужным добавить описание для каждой единицы сущности, мало ли заказчику захочется поменять слово "Юрта" на какое-нибудь другое.
            $table->string('type')->nullable()->default('юрта');

            $table->smallInteger('price')->nullable()->unsigned();
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
