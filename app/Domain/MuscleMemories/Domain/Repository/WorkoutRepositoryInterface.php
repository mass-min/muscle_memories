<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\WorkoutEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\Domain\ValueObject\WorkoutId;

/**
 * Interface WorkoutRepositoryInterface
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
interface WorkoutRepositoryInterface
{
    /**
     * @param WorkoutEntity $trainingEntity
     * @return WorkoutEntity
     */
    public function save(WorkoutEntity $trainingEntity): WorkoutEntity;

    /**
     * @param WorkoutId $id
     * @return WorkoutEntity|null
     */
    public function get(WorkoutId $id): ?WorkoutEntity;

    /**
     * @param UserId $userId
     * @return array
     */
    public function getAllByUserId(UserId $userId): array;
}