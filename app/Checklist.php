<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklist';

    protected $fillable = [

        'node_id',

        'list_body',

        'stage',

        'added_member,'

    ];

    public function Checklist()
    {
        return $this->belongsTo('App\Checknode');
    }
}
