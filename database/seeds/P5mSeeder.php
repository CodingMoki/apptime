<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class P5mSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('P5ms')->insert([
            'id_lokasi' => '2',
            'nrp' => '10200016',
            'id_departemen' => '8',
            'hari' => 'Rabu',
            'tanggal' => now(),
            'id_shift' => '1',
            'materi' => 'Bahaya Kabel Terlilit',
            'photo_p5m' => 'Bahaya',
            'created_date' => now(),
            'updated_date' => now()
        ]);
    }
}

