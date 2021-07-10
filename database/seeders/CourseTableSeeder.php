<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [
            ['id'=>'1','title'=>'fas fa-user','course_fee'=>'Title One','mini_title'=>'Title One','status'=>'0','description'=>'Descriptione'],
            ['id'=>'2','title'=>'fas fa-user','course_fee'=>'Title One','mini_title'=>'Title One','status'=>'0','description'=>'Descriptione'],
        ];
        Course::insert($course);
    }
}
