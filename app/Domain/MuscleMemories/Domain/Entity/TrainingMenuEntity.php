<?php

namespace App\Domain\MuscleMemories\Domain\Entity;

use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuName;

/**
 * Class TrainingMenuEntity
 */
class TrainingMenuEntity
{
    private TrainingMenuId $id;
    private TrainingMenuName $name;

    /**
     * TrainingMenuEntity constructor.
     * @param TrainingMenuId $id
     * @param TrainingMenuName $name
     */
    public function __construct(TrainingMenuId $id, TrainingMenuName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return TrainingMenuId
     */
    public function getId(): TrainingMenuId
    {
        return $this->id;
    }

    /**
     * @return TrainingMenuName
     */
    public function getName(): TrainingMenuName
    {
        return $this->name;
    }
}
