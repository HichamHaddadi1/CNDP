<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date')  ->nullable();
            $table->dateTime('end_date')    ->nullable();
            $table->bigInteger('nb_participants')->default(0);
            $table->foreignId('user_id')    ->constrained('users');
            $table->foreignId('room_id')    ->constrained('rooms');
            $table->foreignId('event_id')   ->constrained('events');
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
        Schema::dropIfExists('histories');
    }
}
