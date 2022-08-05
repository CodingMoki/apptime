<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class P5m extends Model
{
    protected $guarded = [];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function indonesian_format_date($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function indonesian_currency($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
