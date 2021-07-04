<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            ['id'=>'1','title'=>'Title One','sub_title'=>'Sub Title One','status'=>'0',
            'image'=>'no-image'],
            ['id'=>'2','title'=>'Title Two','sub_title'=>'Sub Title Two','status'=>'0',
            'image'=>'no-image']
        ];
        Slider::insert($sliders);

    }
}
