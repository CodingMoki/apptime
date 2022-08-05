<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $guarded = [];
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan_pegawai');
    }
    public function departement()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen');
    }
}
