<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbinspeksi extends Model
{
    protected $guarded = [];

    public function inspeksis()
    {
        return $this->hasMany(inspeksi::class);
    }
}