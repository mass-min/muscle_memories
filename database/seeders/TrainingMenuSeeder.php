<?php

namespace Database\Seeders;

use App\Models\TrainingMenu;
use Illuminate\Database\Seeder;

class TrainingMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainingMenus = [
            ['name' => 'ベンチプレス', 'body_part' => TrainingMenu::PART_CHEST],
            ['name' => 'パラパワーリフティング', 'body_part' => TrainingMenu::PART_CHEST],
            ['name' => 'ダンベルフライ', 'body_part' => TrainingMenu::PART_CHEST],
            ['name' => 'アイソラテラルベンチプレス', 'body_part' => TrainingMenu::PART_CHEST],
            ['name' => 'チェストプレス', 'body_part' => TrainingMenu::PART_CHEST],
            ['name' => '懸垂', 'body_part' => TrainingMenu::PART_BACK],
            ['name' => 'ベントオーバーロー', 'body_part' => TrainingMenu::PART_BACK],
            ['name' => 'ハイクリーン', 'body_part' => TrainingMenu::PART_BACK],
            ['name' => 'ロー/リアデルトイド', 'body_part' => TrainingMenu::PART_BACK],
            ['name' => 'アイソラテラルラットプルダウン', 'body_part' => TrainingMenu::PART_BACK],
            ['name' => 'ワンハンドロウ', 'body_part' => TrainingMenu::PART_BACK],
            ['name' => 'フロントショルダープレス', 'body_part' => TrainingMenu::PART_SHOULDER],
            ['name' => 'リバースグリップショルダープレス', 'body_part' => TrainingMenu::PART_SHOULDER],
            ['name' => 'サイドレイズ', 'body_part' => TrainingMenu::PART_SHOULDER],
            ['name' => 'フロントレイズ', 'body_part' => TrainingMenu::PART_SHOULDER],
            ['name' => 'リアレイズ', 'body_part' => TrainingMenu::PART_SHOULDER],
            ['name' => 'アップライトロー', 'body_part' => TrainingMenu::PART_SHOULDER],
            ['name' => 'ダンベルカール', 'body_part' => TrainingMenu::PART_ARMS],
            ['name' => 'ハンマーカール', 'body_part' => TrainingMenu::PART_ARMS],
            ['name' => 'リストカール', 'body_part' => TrainingMenu::PART_ARMS],
            ['name' => 'バーベルカール', 'body_part' => TrainingMenu::PART_ARMS],
            ['name' => 'トライセプスキックバック', 'body_part' => TrainingMenu::PART_ARMS],
            ['name' => 'フレンチプレス', 'body_part' => TrainingMenu::PART_ARMS],
            ['name' => 'スクワット', 'body_part' => TrainingMenu::PART_LEGS],
            ['name' => 'デッドリフト', 'body_part' => TrainingMenu::PART_LEGS],
            ['name' => 'レッグプレス', 'body_part' => TrainingMenu::PART_LEGS],
            ['name' => 'レッグカール', 'body_part' => TrainingMenu::PART_LEGS],
            ['name' => 'レッグエクステンション', 'body_part' => TrainingMenu::PART_LEGS],
            ['name' => 'ヒップアダクター', 'body_part' => TrainingMenu::PART_LEGS],
            ['name' => 'アブローラー(立ちコロ)', 'body_part' => TrainingMenu::PART_ABS],
            ['name' => 'アブローラー(膝コロ)', 'body_part' => TrainingMenu::PART_ABS],
            ['name' => 'アブローラー(逆手)', 'body_part' => TrainingMenu::PART_ABS],
            ['name' => 'アブローラー(人間コーヒーミル)', 'body_part' => TrainingMenu::PART_ABS],
            ['name' => 'トーソローテーション', 'body_part' => TrainingMenu::PART_ABS],
        ];
        TrainingMenu::insert($trainingMenus);
    }
}
