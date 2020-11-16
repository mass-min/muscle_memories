<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

/**
 * Class TrainingSetIntervalSeconds
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingSetIntervalSeconds
{
    private int $value;

    /**
     * TrainingSetIntervalSeconds constructor.
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