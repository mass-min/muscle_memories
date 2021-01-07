<?php

namespace App\Actions\Jetstream;

use App\Models\Workout;

class CreateWorkout
{
    /**
     * Create the given workout.
     *
     * @param Workout $workout
     * @return void
     */
    public function create(Workout $workout)
    {
        $workout->save();
    }
}
