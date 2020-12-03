<?php

namespace App\Domain\MuscleMemories\UseCase;

use App\Domain\MuscleMemories\Domain\DataTransferObject\TrainingData;
use App\Domain\MuscleMemories\Domain\Repository\TrainingRepositoryInterface;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;

/**
 * Class GetUserTrainingsUseCase
 * @package App\Domain\MuscleMemories\UseCase
 */
final class GetUserTrainingsUseCase
{
    private TrainingRepositoryInterface $trainingRepository;

    /**
     * GetUserTrainingsUseCase constructor.
     * @param TrainingRepositoryInterface $trainingRepository
     */
    public function __construct(TrainingRepositoryInterface $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    /**
     * @param UserId $userId
     * @return TrainingData[]
     */
    public function execute(UserId $userId): array
    {
        return $this->trainingRepository->getAllByUserId($userId);
    }
}