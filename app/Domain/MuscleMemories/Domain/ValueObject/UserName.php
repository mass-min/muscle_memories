<?php

namespace App\Domain\MuscleMemories\Domain\ValueObject;

/**
 * Class UserName
 * @package App\Domain\MuscleMemories\Domain\ValueObject
 */
class UserName
{
    private string $value;

    /**
     * UserName constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        // TODO: ◯文字以下は禁止みたいなことをする
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