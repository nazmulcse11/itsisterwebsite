<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            ['id'=>'1','name'=>'Bappi Saikot','designation'=>'CEO','mini_description'=>'abc',
            'image'=>'no-image'],
            ['id'=>'2','name'=>'Shohag','designation'=>'CTO','mini_description'=>'abc',
            'image'=>'no-image'],
        ];
        Team::insert($teams);
    }
}
