<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category_name' => 'Loa Thành Phẩm',
                'category_slug' => str::slug('LoaThanhPham')
            ],
             [
                'category_name' => 'Loa Rời',
                'category_slug' => str::slug('LoaRoi')
            ],
            [
                'category_name' => 'Mixer',
                'category_slug' => str::slug('Mixer')
            ],
            [
                'category_name' => 'Microphone',
                'category_slug' => str::slug('Microphone')
            ],
            [
                'category_name' => 'Controller',
                'category_slug' => str::slug('Controller')
            ],
            [
                'category_name' => 'Ampli - Công Suất',
                'category_slug' => str::slug('amplicongsuat')
            ],
            [
                'category_name' => 'Đèn PadLed - Beem - Follow',
                'category_slug' => str::slug('paledbeem')
            ],
            [
                'category_name' => 'Phụ Kiện Âm Thanh',
                'category_slug' => str::slug('phukien')
            ],       
            
        ];
        DB::table('vp_categories')->insert($data);
    }
}