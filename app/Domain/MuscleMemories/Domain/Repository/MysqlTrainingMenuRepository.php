<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\Entity\TrainingMenuEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuBodyPart;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuName;
use App\Models\TrainingMenu;

/**
 * Class MysqlTrainingMenuRepository
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
final class MysqlTrainingMenuRepository implements TrainingMenuRepositoryInterface
{
    private TrainingMenu $trainingMenuOrm;

    /**
     * MysqlTrainingMenuRepository constructor.
     */
    public function __construct()
    {
        $this->trainingMenuOrm = new TrainingMenu;
    }

    /**
     * @param TrainingMenuEntity $trainingMenuEntity
     * @return TrainingMenuEntity|null
     */
    public function save(TrainingMenuEntity $trainingMenuEntity): TrainingMenuEntity
    {
        $trainingMenu = new TrainingMenu([
            'training_menu_id' => $trainingMenuEntity->getId()->getValue(),
            'name' => $trainingMenuEntity->getName()->getValue(),
            'body_part' => $trainingMenuEntity->getBodyPart()->getValue(),
        ]);
        $trainingMenu->save();

        return TrainingMenuEntity::reconstructFromRepository(
            new TrainingMenuId($trainingMenu->id),
            new TrainingMenuName($trainingMenu->name),
            new TrainingMenuBodyPart($trainingMenu->body_part),
        );
    }

    /**
     * @param TrainingMenuId $id
     * @return TrainingMenuEntity|null
     */
    public function get(TrainingMenuId $id): ?TrainingMenuEntity
    {
        $trainingMenu = $this->trainingMenuOrm->find($id->getValue());
        if ($trainingMenu) {
            return TrainingMenuEntity::reconstructFromRepository(
                new TrainingMenuId($trainingMenu->training_menu_id),
                new TrainingMenuName($trainingMenu->name),
                new TrainingMenuBodyPart($trainingMenu->body_part),
            );
        } else {
            return null;
        }
    }

    /**
     * @return object
     */
    public function getAll(): object
    {
        return $this->trainingMenuOrm->query()
            ->orderByDesc('created_at')
            ->get()
            ->map(function($trainingMenu) {
                return TrainingMenuEntity::reconstructFromRepository(
                    new TrainingMenuId($trainingMenu->id),
                    new TrainingMenuName($trainingMenu->name),
                    new TrainingMenuBodyPart($trainingMenu->body_part),
                );
            });
    }
}