<?php

namespace App\Domain\MuscleMemories\Domain\DataTransferObject;

class TrainingData
{
    public int $userId;
    public TrainingMenuData $trainingMenu;
    public array $trainingSets;

    /**
     * TrainingData constructor.
     * @param int $userId
     * @param TrainingMenuData $trainingMenu
     * @param TrainingSetData[] $trainingSets
     */
    public function __construct(int $userId, TrainingMenuData $trainingMenu, array $trainingSets)
    {
        $this->userId = $userId;
        $this->trainingMenu = $trainingMenu;
        // arrayで渡したとき、中身がTrainingSetDataの配列じゃなくてもよくなっちゃうのはイヤ
        // TrainingSetData以外のものが引数の配列に入っていたら、getTrainingSet()の引数の型エラーで対処
        foreach ($trainingSets as $trainingSet) {
            $this->trainingSets[] = $this->getTrainingSet($trainingSet);
        }
        $this->trainingSets = $trainingSets;
    }

    /**
     * @param TrainingSetData $trainingSetData
     * @return TrainingSetData
     */
    private function getTrainingSet(TrainingSetData $trainingSetData)
    {
        return $trainingSetData;
    }
}