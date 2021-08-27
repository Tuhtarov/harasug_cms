<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('time_in');
            $table->date('time_out');
            $table->smallInteger('qty_child')->nullable();
            $table->smallInteger('qty_old');
            $table->foreignId('home_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->char('phone', 12);
            $table->boolean('is_confirmed')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
