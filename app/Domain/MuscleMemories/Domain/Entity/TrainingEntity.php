<?php

namespace App\Domain\MuscleMemories\Domain\Entity;

use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;

/**
 * Class TrainingEntity
 * @package App\Domain\MuscleMemories\Domain\Entity
 */
class TrainingEntity
{
    private TrainingId $id;
    private TrainingMenuId $trainingMenuId;
    private UserId $userId;

    /**
     * TrainingEntity constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param TrainingMenuId $trainingMenuId
     * @param UserId $userId
     * @return TrainingEntity
     */
    public static function reconstructFromRepository(
        TrainingMenuId $trainingMenuId,
        UserId $userId
    ): TrainingEntity
    {
        $training = new self;
        $training->trainingMenuId = $trainingMenuId;
        $training->userId = $userId;
        return $training;
    }

    /**
     * @param TrainingMenuId $trainingMenuId
     * @param UserId $userId
     * @return TrainingEntity
     */
    public static function newByTrainee(
        TrainingMenuId $trainingMenuId,
        UserId $userId
    ): TrainingEntity {
        $training = new self;
        $training->trainingMenuId = $trainingMenuId;
        $training->userId = $userId;
        return $training;
    }

    /**
     * @return TrainingId
     */
    public function getId(): TrainingId
    {
        return $this->id;
    }

    /**
     * @return TrainingMenuId
     */
    public function getTrainingMenuId(): TrainingMenuId
    {
        return $this->trainingMenuId;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }
}
