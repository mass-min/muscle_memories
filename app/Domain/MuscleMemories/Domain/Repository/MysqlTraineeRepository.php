<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\UserEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserName;
use App\Models\User;

/**
 * Class MysqlTraineeRepository
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
final class MysqlTraineeRepository implements TraineeRepositoryInterface
{
    /**
     * @param UserEntity $userEntity
     * @return UserEntity
     */
    public function save(UserEntity $userEntity): UserEntity
    {
        $user = new User([
            'id' => $userEntity->getId()->getValue(),
            'name' => $userEntity->getName()->getValue(),
        ]);
        $user->save();

        return UserEntity::reconstructFromRepository(
            new UserId($user->id),
            new UserName($user->name),
        );
    }

    /**
     * @param UserId $id
     * @return UserEntity|null
     */
    public function getTrainee(UserId $id): ?UserEntity
    {
        $userOrm = new User;
        $userData = $userOrm->find($id->getValue());
        if ($userData) {
            return UserEntity::reconstructFromRepository(
                $id,
                new UserName($userData->name)
            );
        } else {
            return null;
        }
    }
}