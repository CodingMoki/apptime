<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Pegawais')->insert([
            'nama_pegawai' => 'proxy',
            'nrp_pegawai' => '107889',
            'jenis_kelamin' => 'pria',
            'id_jabatan_pegawai' => '1',
            'id_departemen' => '1',
            'id_lokasi' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
