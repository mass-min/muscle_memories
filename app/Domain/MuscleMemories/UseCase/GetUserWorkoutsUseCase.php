<?php

namespace App\Domain\MuscleMemories\UseCase;

use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingData;
use App\Domain\MuscleMemories\Domain\Repository\WorkoutRepositoryInterface;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;

/**
 * Class GetUserWorkoutsUseCase
 * @package App\Domain\MuscleMemories\UseCase
 */
final class GetUserWorkoutsUseCase
{
    private WorkoutRepositoryInterface $workoutRepository;

    /**
     * GetUserWorkoutsUseCase constructor.
     * @param WorkoutRepositoryInterface $workoutRepository
     */
    public function __construct(WorkoutRepositoryInterface $workoutRepository)
    {
        $this->workoutRepository = $workoutRepository;
    }

    /**
     * @param UserId $userId
     * @return TrainingData[]
     */
    public function execute(UserId $userId): array
    {
        return $this->workoutRepository->getAllByUserId($userId);
    }
}