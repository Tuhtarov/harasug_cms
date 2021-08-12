<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCommentsForegein extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedSmallInteger('phone_id')->unique();
            $table->unsignedSmallInteger('email_id')->unique();
            $table->foreign('phone_id')->references('id')->on('phones');
            $table->foreign('email_id')->references('id')->on('emails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('phone_id');
            $table->dropForeign('email_id');
        });
    }
}
