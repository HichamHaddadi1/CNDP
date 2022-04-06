<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_name');
            $table->text('room_desc');
            $table->bigInteger('max_viewers')->nullable();
            $table->string('moderator_pw');
            $table->string('viewer_pw')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->string('verified')->default('Pending');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // $table->string('presentations', 2048)->nullable();
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
        Schema::dropIfExists('room');
    }
}
