<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('hub_id');

            $table->string('name');
            $table->string('platform_type'); //likely an ESP8266
            $table->string('device_type'); //relay, sensor, etc
            $table->string('device_specification'); //basic_http_relay, mesh_http_relay, etc

            $table->string('ip_address_and_cidr');
            $table->string('mac_address');
            
            $table->dateTime('adopted_at');
            $table->string('software_version'); //v1.02, this way the system can check for device code updates
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
