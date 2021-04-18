<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checknode extends Model
{
    protected $table = 'checknode';
    protected $fillable = [

        'project_id',

        'node_name',

        'added_member',

    ];

    public function Checknode()
    {
        return $this->belongsTo('App\project');
    }
    public function Checklist()
    {
        return $this->hasMany('App\Checklist');
    }
}
