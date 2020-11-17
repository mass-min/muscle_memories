<?php

namespace App\Domain\MuscleMemories\Domain\Entity;

use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserName;

/**
 * Class UserEntity
 * @package App\Domain\MuscleMemories\Domain\Entity
 */
class UserEntity
{
    private UserId $id;
    private UserName $name;

    /**
     * UserEntity constructor.
     */
    private function __construct()
    {
    }

    /**
     * UserEntity constructor.
     * @param UserId $id
     * @param UserName $name
     * @return UserEntity
     */
    public static function reconstructFromRepository(UserId $id, UserName $name): UserEntity
    {
        $user = new self;
        $user->id = $id;
        $user->name = $name;

        return $user;
    }

    /**
     * @param TrainingMenuId $trainingMenuId
     * @return TrainingEntity
     */
    public function newTraining(TrainingMenuId $trainingMenuId): TrainingEntity
    {
        // トレーニングを作成できないユーザーの場合はエラー

        return TrainingEntity::newByTrainee($trainingMenuId, $this->id);
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return UserName
     */
    public function getName(): UserName
    {
        return $this->name;
    }

    public function trainings(): array
    {
        return 
    }
}

