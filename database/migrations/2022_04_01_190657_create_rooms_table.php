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
            $table->id();
            $table->integer('UnixTime');
            $table->date('dateTime');
            $table->string('room');
            $table->string('Brightness');
            $table->string('SetpointHistory');
            $table->string('Humidity');
            $table->string('Temperature');
            $table->string('ThermostatTemperature');
            $table->string('Virtual_OutdoorTemperature');









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
        Schema::dropIfExists('rooms');
    }
}
