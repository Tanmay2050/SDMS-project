<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public $timestamps = false;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'roll',
        'dept',
        'year',
        'type',
        'title',
        'organization',
        'start',
        'end',
        'certificate',
        'user_id'
    ];
}
