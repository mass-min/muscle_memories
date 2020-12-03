<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingData;
use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingMenuData;
use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingSetData;
use App\Domain\MuscleMemories\Domain\Entity\TrainingEntity;
use App\Domain\MuscleMemories\Domain\Entity\TrainingMenuEntity;
use App\Domain\MuscleMemories\Domain\Entity\TrainingSetEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetIntervalSeconds;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetReps;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetWeight;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Models\Training;
use App\Models\TrainingMenu;

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
     * @param UserId $userId
     * @return array
     */
    public function getAllByUserId(UserId $userId): array
    {
        $trainingEntities = $this->trainingOrm->query()
            ->where('user_id', $userId->getValue())
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($training) {
                $trainingSetEntities = [];
                foreach ($training->trainingSets as $trainingSet) {
                    $trainingSetEntities[] = TrainingSetEntity::reconstructFromRepository(
                        new TrainingSetId($trainingSet->id),
                        new TrainingId($trainingSet->training_id),
                        new TrainingSetReps($trainingSet->reps),
                        new TrainingSetWeight($trainingSet->weight),
                        new TrainingSetIntervalSeconds($trainingSet->interval_seconds),
                    );
                }
                return TrainingEntity::reconstructFromRepository(
                    new TrainingMenuId($training->training_menu_id),
                    new UserId($training->id),
                    $trainingSetEntities,
                );
            })
            ->toArray();

        $trainings = [];

        foreach ($trainingEntities as $trainingEntity) {
            $trainingSets = [];

            foreach ($trainingEntity->getTrainingSets() as $trainingSetEntity) {
                $trainingSets[] = new TrainingSetData(
                    $trainingSetEntity->getId()->getValue(),
                    $trainingSetEntity->getTrainingId()->getValue(),
                    $trainingSetEntity->getReps()->getValue(),
                    $trainingSetEntity->getWeight()->getValue(),
                    $trainingSetEntity->getIntervalSeconds()->getValue(),
                );
            }

            $trainings[] = new TrainingData(
                $userId->getValue(),
                new TrainingMenuData($trainingEntity->getTrainingMenuId()->getValue(), 'hoge'),
                $trainingSets
            );
        }

        return $trainings;
    }
}