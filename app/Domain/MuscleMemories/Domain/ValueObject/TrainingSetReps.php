<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

/**
 * Class TrainingSetReps
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingSetReps
{
    private int $value;

    /**
     * TrainingSetReps constructor.
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
