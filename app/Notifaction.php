<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifaction extends Model
{
    protected $fillable = [
        'sender',
        'receiver',
        'body',
        'readed',
        'type',

    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
