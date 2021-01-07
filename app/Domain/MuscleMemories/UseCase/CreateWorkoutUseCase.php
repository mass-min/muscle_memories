<?php

namespace App\Domain\MuscleMemories\UseCase;

use App\Domain\MuscleMemories\Domain\Entity\TrainingEntity;
use App\Domain\MuscleMemories\Domain\Repository\TraineeRepositoryInterface;
use App\Domain\MuscleMemories\Domain\Repository\TrainingRepositoryInterface;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;

/**
 * Class CreateWorkoutUseCase
 * @package App\Domain\MuscleMemories\UseCase
 */
final class CreateWorkoutUseCase
{
    private TrainingRepositoryInterface $trainingRepository;
    private TraineeRepositoryInterface $traineeRepository;

    /**
     * CreateWorkoutUseCase constructor.
     * @param TrainingRepositoryInterface $trainingRepository
     * @param TraineeRepositoryInterface $traineeRepository
     */
    public function __construct(
        TrainingRepositoryInterface $trainingRepository,
        TraineeRepositoryInterface $traineeRepository
    )
    {
        $this->trainingRepository = $trainingRepository;
        $this->traineeRepository = $traineeRepository;
    }

    /**
     * @param TrainingMenuId $trainingMenuId
     * @param UserId $userId
     * @return TrainingEntity
     */
    public function execute(
        TrainingMenuId $trainingMenuId,
        UserId $userId
    ): TrainingEntity
    {
        $trainee = $this->traineeRepository->getTrainee($userId);
        $workout = $trainee->newWorkout();
        $training = $trainee->newTraining($workout->getId(), $trainingMenuId);

        return $this->trainingRepository->save($training);
    }
}