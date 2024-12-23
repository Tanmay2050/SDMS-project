<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{   
    public $timestamps = false;
    protected $table = 'paper';
    protected $fillable = [
        'name',
        'roll',
        'dept',
        'year',
        'title',
        'year_p',
        'publisher',
        'paper',
        'user_id'
    ];
}
