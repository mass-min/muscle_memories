<?php

namespace App\Domain\MuscleMemories\Domain\DataTransferObject;

class TrainingSetData
{
    public int $id;
    public int $trainingId;
    public int $reps;
    public int $weight;
    public int $intervalSeconds;

    /**
     * TrainingSetData constructor.
     * @param int $id
     * @param int $trainingId
     * @param int $reps
     * @param int $weight
     * @param int $intervalSeconds
     */
    public function __construct(int $id, int $trainingId, int $reps, int $weight, int $intervalSeconds)
    {
        $this->id = $id;
        $this->trainingId = $trainingId;
        $this->reps = $reps;
        $this->weight = $weight;
        $this->intervalSeconds = $intervalSeconds;

    }
}