<?php

/**
 * Class User
 */
class User
{
    private $id;
    private $name;

    /**
     * User constructor.
     * @param UserId $id
     * @param UserName $name
     */
    public function __construct(UserId $id, UserName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return UserId
     */
    public function id() {
        return $this->id;
    }

    /**
     * @return UserName
     */
    public function name()
    {
        return $this->name;
    }
}

/**
 * Class UserId
 */
class UserId
{
    private $value;

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

/**
 * Class UserName
 */
class UserName
{
    private $value;

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
    public function getValue()
    {
        return $this->value;
    }
}