<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = [
            ['id'=>'1','type'=>'service','mini_description'=>'Descriptione'],
            ['id'=>'2','type'=>'course','mini_description'=>'Descriptione'],
        ];
        Section::insert($section);
    }
}
