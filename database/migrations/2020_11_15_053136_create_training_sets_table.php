<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->index();
            $table->unsignedInteger('reps');
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('interval_seconds');
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
        Schema::dropIfExists('training_sets');
    }
}
