<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * There's a bit of a conflict here on what to do to make
     * these measurements more flexible. You could make the
     * generic "value" a string, but then you have a lot of
     * coercion going on throughout the app, which isn't ideal.
     * You could create a table for every measurement type, but
     * that seems like it would balloon quickly. On top of that,
     * it is harder to validate a string.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('measurement_type_id');
            $table->datetimeTz('log_date');
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
