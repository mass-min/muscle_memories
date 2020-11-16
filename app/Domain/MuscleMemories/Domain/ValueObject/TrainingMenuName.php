<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

use InvalidArgumentException;

/**
 * Class TrainingMenuName
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingMenuName
{
    private string $value;

    /**
     * TrainingMenuName constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new InvalidArgumentException('TrainingMenuName cannot be null.');
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}