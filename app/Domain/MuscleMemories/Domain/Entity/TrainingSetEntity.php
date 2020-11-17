<?php

namespace App\Domain\MuscleMemories\Domain\Entity;

use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetIntervalSeconds;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetReps;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetWeight;

/**
 * Class TrainingSetEntity
 * @package App\Domain\MuscleMemories\Domain\Entity
 */
class TrainingSetEntity
{
    private TrainingSetId $id;
    private TrainingId $trainingId;
    private TrainingSetReps $reps;
    private TrainingSetWeight $weight;
    private TrainingSetIntervalSeconds $intervalSeconds;

    /**
     * TrainingSetEntity constructor.
     * @param TrainingSetId $id
     * @param trainingId $trainingId
     * @param TrainingSetReps $reps
     * @param TrainingSetWeight $weight
     * @param TrainingSetIntervalSeconds $intervalSeconds
     */
    public function __construct(
        TrainingSetId $id,
        trainingId $trainingId,
        TrainingSetReps $reps,
        TrainingSetWeight $weight,
        TrainingSetIntervalSeconds $intervalSeconds
    )
    {
        $this->id = $id;
        $this->trainingId = $trainingId;
        $this->reps = $reps;
        $this->weight = $weight;
        $this->intervalSeconds = $intervalSeconds;
    }
}
