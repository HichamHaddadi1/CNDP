<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('starting_at');
            $table->dateTime('ending_at');
            $table->boolean('event_mode')->nullable();
            $table->string('event_lang')->nullable();
            $table->string('event_theme');
            $table->string('event_desc');
            $table->string('isVerified')->default('Pending');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('event_statue')->default(false);
            $table->unsignedBigInteger('id_room');
            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('event');
    }
}
