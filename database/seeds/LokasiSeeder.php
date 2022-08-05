<?php

use App\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            'lokasi' => 'Lokasi A'
        ]);
        Lokasi::create([
            'lokasi' => 'Lokasi B'
        ]);
        Lokasi::create([
            'lokasi' => 'Lokasi C'
        ]);
    }
}
