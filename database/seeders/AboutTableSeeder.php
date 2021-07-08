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
            ['id'=>'1','title'=>'Title One','description'=>'Descriptione'],
            ['id'=>'2','title'=>'Title Two','description'=>'Test'],
        ];
        About::insert($abouts);
    }
}
