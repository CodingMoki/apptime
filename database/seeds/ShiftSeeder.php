<?php

use App\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shift::create([
            'shifts' => 'Shift1'
        ]);
        Shift::create([
            'shifts' => 'Shift2'
        ]);
    }
}
