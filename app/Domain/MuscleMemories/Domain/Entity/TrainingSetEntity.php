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
     */
    private function __construct()
    {
    }

    /**
     * @param TrainingSetId $id
     * @param trainingId $trainingId
     * @param TrainingSetReps $reps
     * @param TrainingSetWeight $weight
     * @param TrainingSetIntervalSeconds $intervalSeconds
     * @return TrainingSetEntity
     */
    public static function reconstructFromRepository(
        TrainingSetId $id,
        trainingId $trainingId,
        TrainingSetReps $reps,
        TrainingSetWeight $weight,
        TrainingSetIntervalSeconds $intervalSeconds
    ): TrainingSetEntity
    {
        $trainingSet = new self;
        $trainingSet->id = $id;
        $trainingSet->trainingId = $trainingId;
        $trainingSet->reps = $reps;
        $trainingSet->weight = $weight;
        $trainingSet->intervalSeconds = $intervalSeconds;
        return $trainingSet;
    }

    /**
     * @return TrainingSetId
     */
    public function getId(): TrainingSetId
    {
        return $this->id;
    }

    /**
     * @return TrainingId
     */
    public function getTrainingId(): TrainingId
    {
        return $this->trainingId;
    }

    /**
     * @return TrainingSetReps
     */
    public function getReps(): TrainingSetReps
    {
        return $this->reps;
    }

    /**
     * @return TrainingSetWeight
     */
    public function getWeight(): TrainingSetWeight
    {
        return $this->weight;
    }

    /**
     * @return TrainingSetIntervalSeconds
     */
    public function getIntervalSeconds(): TrainingSetIntervalSeconds
    {
        return $this->intervalSeconds;
    }
}
