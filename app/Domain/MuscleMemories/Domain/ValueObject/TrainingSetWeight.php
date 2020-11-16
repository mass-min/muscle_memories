<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

/**
 * Class TrainingSetWeight
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingSetWeight
{
    private int $value;

    /**
     * TrainingSetWeight constructor.
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
