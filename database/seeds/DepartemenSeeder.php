<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nama_departemens = [
            '',
            'Sistem Pengawasan Internal',
            'Hukum dan Kesekretariatan',
            'Sekretaris Perusahaan & Kepatuhan',
            'Keselamatan, Kesehatan Kerja & Lingkungan (K3)',
            'Pusat Kendali Operasi (PKO)'
        ];

        for ($i = 1; $i < count($nama_departemens); $i++) {
            DB::table('departemens')->insert([
                'departemen' => $nama_departemens[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
