<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intership extends Model
{
    protected $table = 'internshipadd';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'roll',
        'dept',
        'year',
        'organization',
        'start',
        'end',
        'certificate',
        'user_id'
    ];
}
