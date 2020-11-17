<?php

namespace App\Domain\MuscleMemories\Domain\Entity;

use App\Domain\MuscleMemories\Domain\Repository\TrainingMenuRepositoryInterface;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuBodyPart;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuName;

/**
 * Class TrainingMenuEntity
 * @package App\Domain\MuscleMemories\Domain\Entity
 */
class TrainingMenuEntity
{
    private TrainingMenuId $id;
    private TrainingMenuName $name;
    private TrainingMenuBodyPart $bodyPart;

    /**
     * TrainingMenuEntity constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param TrainingMenuId $id
     * @param TrainingMenuName $name
     * @param TrainingMenuBodyPart $bodyPart
     * @return TrainingMenuEntity
     */
    public static function reconstructFromRepository(
        trainingMenuId $id,
        TrainingMenuName $name,
        TrainingMenuBodyPart $bodyPart
    ): TrainingMenuEntity
    {
        $trainingMenu = new self;
        $trainingMenu->id = $id;
        $trainingMenu->name = $name;
        $trainingMenu->bodyPart = $bodyPart;
        return $trainingMenu;
    }

    /**
     * @return array
     */
    public static function getTrainingMenuSelectOptions(): array
    {
        $trainingMenuRepository = app(TrainingMenuRepositoryInterface::class);

        return $trainingMenuRepository->getAll()->mapToGroups(function ($trainingMenuEntity, $key) {
            return [
                $trainingMenuEntity->bodyPart->getValue() => [
                    'id' => $trainingMenuEntity->id->getValue(),
                    'name' => $trainingMenuEntity->name->getValue()
                ]
            ];
        })->toArray();
    }

    /**
     * @return TrainingMenuName
     */
    public function getName(): TrainingMenuName
    {
        return $this->name;
    }

    /**
     * @return TrainingMenuId
     */
    public function getId(): TrainingMenuId
    {
        return $this->id;
    }

    /**
     * @return TrainingMenuBodyPart
     */
    public function getBodyPart(): TrainingMenuBodyPart
    {
        return $this->bodyPart;
    }
}
