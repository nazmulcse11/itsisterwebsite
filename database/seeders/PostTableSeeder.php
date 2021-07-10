<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            ['id'=>'1','title'=>'fas fa-user','url'=>'Title One','image'=>'No iMage','status'=>'0','description'=>'Descriptione'],
            ['id'=>'2','title'=>'fas fa-user','url'=>'Title One','image'=>'No iMage','status'=>'0','description'=>'Descriptione'],
        ];
        Post::insert($post);
    }
}
