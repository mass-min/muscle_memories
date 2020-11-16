<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\TrainingEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Models\Training;

final class TrainingRepository implements TrainingRepositoryInterface
{
    /**
     * @param TrainingEntity $trainingEntity
     * @return TrainingEntity|null
     */
    public function save(TrainingEntity $trainingEntity): TrainingEntity
    {
        $training = new Training([
            'training_menu_id' => $trainingEntity->getTrainingMenuId()->getValue(),
            'user_id' => $trainingEntity->getUserId()->getValue(),
        ]);
        $training->save();

        return TrainingEntity::reconstructFromRepository(
            new TrainingMenuId($training->training_menu_id),
            new UserId($training->user_id)
        );
    }

    /**
     * @param TrainingId $id
     * @return TrainingEntity|null
     */
    public function getTraining(TrainingId $id): ?TrainingEntity
    {
        $training = Training::find($id->getValue());
        if ($training) {
            return TrainingEntity::reconstructFromRepository(
                new TrainingMenuId($training->training_menu_id),
                new UserId($training->user_id)
            );
        } else {
            return null;
        }
    }
}