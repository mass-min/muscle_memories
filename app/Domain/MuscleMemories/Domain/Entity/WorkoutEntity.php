<?php

namespace App\Domain\MuscleMemories\Domain\Entity;

use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\Domain\ValueObject\WorkoutId;

/**
 * Class WorkoutEntity
 * @package App\Domain\MuscleMemories\Domain\Entity
 */
class WorkoutEntity
{
    private WorkoutId $id;
    private UserId $userId;
    /**
     * @var TrainingEntity[]
     */
    private array $trainings;

    /**
     * WorkoutEntity constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param WorkoutId $workoutId
     * @param UserId $userId
     * @return WorkoutEntity
     */
    public static function reconstructFromRepository(
        WorkoutId $workoutId,
        UserId $userId
    ): WorkoutEntity
    {
        $workout = new self;
        $workout->userId = $userId;
        return $workout;
    }

    /**
     * @param WorkoutId $workoutId
     * @param UserId $userId
     * @return WorkoutEntity
     */
    public static function newByTrainee(
        WorkoutId $workoutId,
        UserId $userId
    ): WorkoutEntity {
        $workout = new self;
        $workout->id = $workoutId;
        $workout->userId = $userId;
        return $workout;
    }

    /**
     * @return WorkoutId
     */
    public function getId(): WorkoutId
    {
        return $this->id;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }

    /**
     * @return TrainingEntity[]
     */
    public function getTrainings(): array
    {
        return $this->trainings;
    }
}
