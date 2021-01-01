<?php

use App\Models\TrainingMenu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('body_part', [
                TrainingMenu::PART_CHEST,
                TrainingMenu::PART_BACK,
                TrainingMenu::PART_SHOULDER,
                TrainingMenu::PART_ARMS,
                TrainingMenu::PART_LEGS,
                TrainingMenu::PART_ABS,
            ]);
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
        Schema::dropIfExists('training_menus');
    }
}
