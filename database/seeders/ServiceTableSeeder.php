<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = [
            ['id'=>'1','icon'=>'fas fa-user','url'=>'Title One','title'=>'Title One','status'=>'0','description'=>'Descriptione'],
            ['id'=>'2','icon'=>'fas fa-user','url'=>'Title One','title'=>'Title One','status'=>'0','description'=>'Descriptione'],
        ];
        Service::insert($service);
    }
}
