<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

use InvalidArgumentException;

/**
 * Class TrainingMenuId
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingMenuId
{
    private int $value;

    /**
     * TrainingMenuId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        if (is_null($value)) {
            throw new InvalidArgumentException('TrainingMenuId cannot be null.');
        }
        if ($value <= 0) {
            throw new InvalidArgumentException('TrainingMenuId should be a natural number.');
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
