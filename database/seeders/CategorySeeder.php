<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Ảnh troll',
            ], 
            [
                'title' => 'Clip funvl',
            ], 
            [
                'title' => 'Xác ướp',
            ], 
            [
                'title' => 'Ảo tưởng sức mạnh',
            ], 
            [
                'title' => 'Running man',
            ], 
            [
                'title' => 'Ảnh bựa VL',
            ], 
            [
                'title' => 'Faptv',
            ], 
            [
                'title' => '500 anh em',
            ], 
            [
                'title' => 'Ancient aliens',
            ], 
            [
                'title' => 'Video cảm động',
            ], 
            [
                'title' => 'Siêu nhân',
            ], 
            [
                'title' => 'Kinh dị',
            ], 
            [
                'title' => 'Comment hài',
            ], 
            [
                'title' => 'Nhạc Remix hay',
            ], 
            [
                'title' => 'Ảnh ấn tượng',
            ], 
            [
                'title' => 'Pháo hoa Tết',
            ], 
            [
                'title' => 'Xăm trổ',
            ], 
            [
                'title' => 'Chuyện tình lãng mạn',
            ], 
            [
                'title' => 'Giang hồ',
            ]

        ];
        DB::table('categories')->insert($categories);
    }
}
