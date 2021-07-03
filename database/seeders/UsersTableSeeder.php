<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id'=>'3','name'=>'Test','email'=>'test@gmail.com','password'=>bcrypt('12345678')]
        ];
        User::insert($users);
    }
}
