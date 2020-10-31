<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('measurement_type_id');
            $table->date('log_date');
            $table->double('value');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('measurement_type_id')->references('id')->on('measurement_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}
