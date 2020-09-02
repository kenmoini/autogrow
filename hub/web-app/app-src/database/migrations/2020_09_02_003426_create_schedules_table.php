<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('device_id');
            $table->integer('user_id'); //Who created the schedule item

            $table->string('interval_type');
            $table->string('interval_spec');

            $table->string('command_type'); //api_get, api_post, local_shell, artisan_command, etc
            $table->text('command_spec'); // eg, '/relay/on', 'avrdude -p blah -b 118860 ...', 'cache:clear', etc
            $table->text('command_meta_data'); //eg, data to post, in JSON format

            $table->foreign('device_id')->references('id')->on('devices');
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
        Schema::dropIfExists('schedules');
    }
}
