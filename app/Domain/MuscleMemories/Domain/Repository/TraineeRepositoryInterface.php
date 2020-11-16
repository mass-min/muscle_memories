<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\UserEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;

/**
 * Interface TraineeRepositoryInterface
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
interface TraineeRepositoryInterface
{
    /**
     * @param UserEntity $userEntity
     * @return UserEntity
     */
    public function save(UserEntity $userEntity): UserEntity;

    /**
     * @param UserId $id
     * @return UserEntity|null
     */
    public function getTrainee(UserId $id): ?UserEntity;
}