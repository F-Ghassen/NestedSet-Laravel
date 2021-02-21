<?php

namespace Database\Seeders;

use App\Models\Technologie;
use Illuminate\Database\Seeder;

class TechnologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technologie::create(['name'=>'ADSL']);
        Technologie::create(['name'=>'SDSL']);
        Technologie::create(['name'=>'FIBER']);
    }
}
