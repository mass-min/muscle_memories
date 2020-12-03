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
     * @var TrainingSetEntity[]
     */
    private array $trainingSets;

    /**
     * TrainingEntity constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param TrainingMenuId $trainingMenuId
     * @param UserId $userId
     * @param TrainingSetEntity[] $trainingSets
     * @return TrainingEntity
     */
    public static function reconstructFromRepository(
        TrainingMenuId $trainingMenuId,
        UserId $userId,
        array $trainingSets
    ): TrainingEntity
    {
        $training = new self;
        $training->trainingMenuId = $trainingMenuId;
        $training->userId = $userId;
        $training->trainingSets = [];
        foreach ($trainingSets as $trainingSet) {
            $training->trainingSets[] = self::addTrainingSet($trainingSet);
        }
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

    /**
     * @return TrainingSetEntity[]
     */
    public function getTrainingSets(): array
    {
        return $this->trainingSets;
    }

    /**
     * @param TrainingSetEntity $trainingSetEntity
     * @return TrainingSetEntity
     */
    private static function addTrainingSet(TrainingSetEntity $trainingSetEntity) {
        return $trainingSetEntity;
    }
}
