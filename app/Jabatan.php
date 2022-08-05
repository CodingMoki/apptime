<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';
    protected $guarded = [];
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan_pegawai');
    }
}
