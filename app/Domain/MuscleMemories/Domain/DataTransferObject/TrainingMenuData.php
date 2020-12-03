<?php


namespace App\Domain\MuscleMemories\Domain\DataTransferObject;


class TrainingMenuData
{
    public int $id;
    public string $name;

    /**
     * TrainingMenuData constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}