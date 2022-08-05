<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    protected $guarded = [];

    public function inspeksis()
    {
        return $this->hasMany(inspeksis::class);
    }

}
