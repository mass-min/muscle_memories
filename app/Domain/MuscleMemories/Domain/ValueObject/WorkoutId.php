<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

use InvalidArgumentException;

/**
 * Class WorkoutId
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class WorkoutId
{
    private int $value;

    /**
     * WorkoutId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        if (is_null($value)) {
            throw new InvalidArgumentException('WorkoutId cannot be null.');
        }
        if ($value <= 0) {
            throw new InvalidArgumentException('WorkoutId should be a natural number.');
        }

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