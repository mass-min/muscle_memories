<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

/**
 * Class TrainingSetId
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingSetId
{
    private int $value;

    /**
     * TrainingSetId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}