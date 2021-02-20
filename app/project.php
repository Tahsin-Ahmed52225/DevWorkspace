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
}
