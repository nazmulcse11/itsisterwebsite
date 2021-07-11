<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abouts = [
            ['id'=>'1','who_we_are'=>'Title One','why_choose_us'=>'abc','description'=>'Descriptione'],
            ['id'=>'2','who_we_are'=>'Title One','why_choose_us'=>'abc','description'=>'Descriptione'],
        ];
        About::insert($abouts);
    }
}
