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
            ['name' => 'ベンチプレス', 'body_part' => 'chest'],
            ['name' => 'パラパワーリフティング', 'body_part' => 'chest'],
            ['name' => 'ダンベルフライ', 'body_part' => 'chest'],
            ['name' => 'アイソラテラルベンチプレス', 'body_part' => 'chest'],
            ['name' => 'チェストプレス', 'body_part' => 'chest'],
            ['name' => '懸垂', 'body_part' => 'back'],
            ['name' => 'ベントオーバーロー', 'body_part' => 'back'],
            ['name' => 'ハイクリーン', 'body_part' => 'back'],
            ['name' => 'ロー/リアデルトイド', 'body_part' => 'back'],
            ['name' => 'アイソラテラルラットプルダウン', 'body_part' => 'back'],
            ['name' => 'ワンハンドロウ', 'body_part' => 'back'],
            ['name' => 'ショルダープレス', 'body_part' => 'shoulder'],
            ['name' => 'サイドレイズ', 'body_part' => 'shoulder'],
            ['name' => 'フロントレイズ', 'body_part' => 'shoulder'],
            ['name' => 'リアレイズ', 'body_part' => 'shoulder'],
            ['name' => 'アップライトロー', 'body_part' => 'shoulder'],
            ['name' => 'ダンベルカール', 'body_part' => 'arms'],
            ['name' => 'ハンマーカール', 'body_part' => 'arms'],
            ['name' => 'リストカール', 'body_part' => 'arms'],
            ['name' => 'バーベルカール', 'body_part' => 'arms'],
            ['name' => 'トライセプスキックバック', 'body_part' => 'arms'],
            ['name' => 'フレンチプレス', 'body_part' => 'arms'],
            ['name' => 'スクワット', 'body_part' => 'legs'],
            ['name' => 'デッドリフト', 'body_part' => 'legs'],
            ['name' => 'レッグプレス', 'body_part' => 'legs'],
            ['name' => 'レッグカール', 'body_part' => 'legs'],
            ['name' => 'レッグエクステンション', 'body_part' => 'legs'],
            ['name' => 'ヒップアダクター', 'body_part' => 'legs'],
            ['name' => 'アブローラー(立ちコロ)', 'body_part' => 'abs'],
            ['name' => 'アブローラー(膝コロ)', 'body_part' => 'abs'],
            ['name' => 'アブローラー(逆手)', 'body_part' => 'abs'],
            ['name' => 'アブローラー(人間コーヒーミル)', 'body_part' => 'abs'],
            ['name' => 'トーソローテーション', 'body_part' => 'abs'],
        ];
        TrainingMenu::insert($trainingMenus);
    }
}
