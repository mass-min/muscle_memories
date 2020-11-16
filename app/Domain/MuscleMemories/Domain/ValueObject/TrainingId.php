<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

use InvalidArgumentException;

/**
 * Class TrainingId
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingId
{
    private int $value;

    /**
     * TrainingId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        if (is_null($value)) {
            throw new InvalidArgumentException('TrainingId cannot be null.');
        }
        if ($value <= 0) {
            throw new InvalidArgumentException('TrainingId should be a natural number.');
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