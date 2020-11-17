<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\TrainingMenuEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;

/**
 * Interface TrainingMenuRepositoryInterface
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
interface TrainingMenuRepositoryInterface
{
    /**
     * @param TrainingMenuEntity $trainingEntity
     * @return TrainingMenuEntity
     */
    public function save(TrainingMenuEntity $trainingEntity): TrainingMenuEntity;

    /**
     * @param TrainingMenuId $id
     * @return TrainingMenuEntity|null
     */
    public function get(TrainingMenuId $id): ?TrainingMenuEntity;

    /**
     * @return object
     */
    public function getAll(): object;
}