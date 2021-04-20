<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklist';
    protected $fillable = [

        'checknode_id',

        'list_body',

        'stage',

        'added_member',

    ];

    public function Checknode()
    {
        return $this->belongsTo('App\Checknode');
    }
}
