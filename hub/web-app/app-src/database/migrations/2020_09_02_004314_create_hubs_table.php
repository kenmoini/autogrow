<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug');

            $table->string('wan_ip_type')->nullable();
            $table->string('wan_ip_address_and_cidr')->nullable();
            $table->string('wan_mac_address')->nullable();

            $table->string('ap_ip_type');
            $table->string('ap_ip_address_and_cidr');
            $table->string('ap_mac_address');
            $table->string('ap_ssid');
            $table->string('ap_psk');

            $table->string('location_name')->nullable();
            $table->string('location_details')->nullable();

            $table->string('rtc_enabled')->nullable(); //Null if not, RTC type if so
            $table->string('platform_type')->nullable(); //Mostly just RPI versions
            $table->string('autogrow_os_version')->nullable();

            $table->integer('user_id'); //Who added the hub
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hubs');
    }
}
