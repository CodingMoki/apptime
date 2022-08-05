<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemens';
    protected $guarded = [];
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'id_lokasi');
    }
}
