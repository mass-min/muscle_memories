<?php

namespace App\Domain\MuscleMemories\Domain\Repository;

use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingData;
use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingMenuData;
use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingSetData;
use App\Domain\MuscleMemories\Domain\Entity\TrainingEntity;
use App\Domain\MuscleMemories\Domain\Entity\WorkoutEntity;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetIntervalSeconds;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingSetWeight;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\Domain\ValueObject\WorkoutId;
use App\Models\Workout;

/**
 * Class MysqlWorkoutRepository
 * @package App\Domain\MuscleMemories\Domain\Repository
 */
final class MysqlWorkoutRepository implements WorkoutRepositoryInterface
{
    private Workout $workoutOrm;

    /**
     * MysqlWorkoutRepository constructor.
     */
    public function __construct()
    {
        $this->workoutOrm = new Workout;
    }

    /**
     * @param WorkoutEntity $workoutEntity
     * @return WorkoutEntity|null
     */
    public function save(WorkoutEntity $workoutEntity): WorkoutEntity
    {
        $workout = new Workout([
            'user_id' => $workoutEntity->getUserId()->getValue(),
        ]);
        $workout->save();

        return WorkoutEntity::reconstructFromRepository(
            new WorkoutId($workout->id),
            new UserId($workout->user_id)
        );
    }

    /**
     * @param WorkoutId $id
     * @return WorkoutEntity|null
     */
    public function get(WorkoutId $id): ?WorkoutEntity
    {
        $workout = $this->workoutOrm->find($id->getValue());
        if ($workout) {
            return WorkoutEntity::reconstructFromRepository(
                new WorkoutId($workout->id),
                new UserId($workout->user_id)
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
        return [];
    }
//        $workoutEntities = $this->workoutOrm->query()
//            ->where('user_id', $userId->getValue())
//            ->orderByDesc('created_at')
//            ->get()
//            ->map(function ($workout) {
//                $trainingEntities = [];
//                foreach ($workout->trainings as $training) {
//                    $trainingEntities[] = TrainingEntity::reconstructFromRepository(
//                        new TrainingId($training->id),
//                        new ($trainingSet->reps),
//                        new TrainingSetWeight($trainingSet->weight),
//                        new TrainingSetIntervalSeconds($trainingSet->interval_seconds),
//                    );
//                }
//                return TrainingEntity::reconstructFromRepository(
//                    new TrainingMenuId($training->training_menu_id),
//                    new UserId($training->id),
//                    $trainingSetEntities,
//                );
//            })
//            ->toArray();
//
//        $trainings = [];
//
//        foreach ($trainingEntities as $trainingEntity) {
//            $trainingSets = [];
//
//            foreach ($trainingEntity->getTrainingSets() as $trainingSetEntity) {
//                $trainingSets[] = new TrainingSetData(
//                    $trainingSetEntity->getId()->getValue(),
//                    $trainingSetEntity->getTrainingId()->getValue(),
//                    $trainingSetEntity->getReps()->getValue(),
//                    $trainingSetEntity->getWeight()->getValue(),
//                    $trainingSetEntity->getIntervalSeconds()->getValue(),
//                );
//            }
//
//            $trainings[] = new TrainingData(
//                $userId->getValue(),
//                new TrainingMenuData($trainingEntity->getTrainingMenuId()->getValue(), 'hoge'),
//                $trainingSets
//            );
//        }
//
//        return $trainings;
//    }
}