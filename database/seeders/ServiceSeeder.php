<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create(['name'=>'Service_A']);
        Service::create(['name'=>'Service_B']);
        Service::create(['name'=>'Service_C']);
    }
}
