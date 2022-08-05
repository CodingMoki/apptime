<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'shift_code'
    ];
    protected $table = 'shifts';
}
