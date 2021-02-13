<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timetrack extends Model
{
    protected $fillable = [
        'memberID',
        'description',
        'hour',
        'min', 

    ];
    protected $table = 'timetrack';
}
