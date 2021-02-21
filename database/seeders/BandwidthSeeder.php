<?php

namespace Database\Seeders;

use App\Models\Bandwidth;
use Illuminate\Database\Seeder;

class BandwidthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bandwidth::create(['upload' => 10,'download' => 20,'technologie_id' => 1]);
        Bandwidth::create(['upload' => 5,'download' => 20,'technologie_id' => 1]);
        Bandwidth::create(['upload' => 20,'download' => 20,'technologie_id' => 2]);
        Bandwidth::create(['upload' => 50,'download' => 50,'technologie_id' => 2]);
        Bandwidth::create(['upload' => 100,'download' => 100,'technologie_id' => 3]);
    }
}
