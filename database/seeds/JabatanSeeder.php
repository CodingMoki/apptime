<?php

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama_jabatan = [
            '',
            'Officer/ Foreman',
            'Supervisor',
            'Manajer',
            'Asisten Manajer',
            'Senior Manajer',
            'Direktur'
        ];

        for ($i = 1; $i < count($nama_jabatan); $i++) {
            DB::table('jabatans')->insert([
                'jabatan' => $nama_jabatan[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
