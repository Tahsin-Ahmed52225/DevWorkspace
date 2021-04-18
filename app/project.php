<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'title',
        'description',
        'department',
        'deadline',
        'manager_id',
        'DocumentName',
        'project_id',
        'project_board',
        'priority',
    ];

    public function checknode()
    {
        return $this->hasMany('App\Checknode');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
