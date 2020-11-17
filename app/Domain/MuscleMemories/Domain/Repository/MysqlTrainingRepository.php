<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\TrainingEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Models\Training;

/**
 * Class MysqlTrainingRepository
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
final class MysqlTrainingRepository implements TrainingRepositoryInterface
{
    private Training $trainingOrm;

    /**
     * MysqlTrainingRepository constructor.
     */
    public function __construct()
    {
        $this->trainingOrm = new Training;
    }

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
    public function get(TrainingId $id): ?TrainingEntity
    {
        $training = $this->trainingOrm->find($id->getValue());
        if ($training) {
            return TrainingEntity::reconstructFromRepository(
                new TrainingMenuId($training->training_menu_id),
                new UserId($training->user_id)
            );
        } else {
            return null;
        }
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->trainingOrm->query()
            ->orderByDesc('created_at')
            ->get()
            ->map(function($training) {
                return TrainingEntity::reconstructFromRepository(
                    new TrainingMenuId($training->training_menu_id),
                    new UserId($training->id),
                );
            });
    }
}