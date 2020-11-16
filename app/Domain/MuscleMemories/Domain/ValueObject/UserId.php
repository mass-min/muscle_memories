<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

/**
 * Class UserId
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class UserId
{
    private int $value;

    /**
     * UserId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        // TODO: 0以下の値が入ってきたらエラー返す
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