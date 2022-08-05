<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $guarded = [];
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'id_lokasi');
    }
}
