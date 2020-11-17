<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

use InvalidArgumentException;

/**
 * Class TrainingMenuBodyPart
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class TrainingMenuBodyPart
{
    private string $value;

    /**
     * TrainingMenuBodyPart constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new InvalidArgumentException('TrainingMenuBodyPart cannot be null.');
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