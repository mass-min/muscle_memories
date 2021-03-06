<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\TrainingEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;

/**
 * Interface TrainingRepositoryInterface
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
interface TrainingRepositoryInterface
{
    /**
     * @param TrainingEntity $trainingEntity
     * @return TrainingEntity
     */
    public function save(TrainingEntity $trainingEntity): TrainingEntity;

    /**
     * @param TrainingId $id
     * @return TrainingEntity|null
     */
    public function get(TrainingId $id): ?TrainingEntity;

    /**
     * @param UserId $userId
     * @return array
     */
    public function getAllByUserId(UserId $userId): array;
}