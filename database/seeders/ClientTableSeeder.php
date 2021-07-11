<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = [
            ['id'=>'1','image'=>'no-image','url'=>''],
            ['id'=>'2','image'=>'no-image','url'=>''],
        ];
        Client::insert($client);
    }
}
