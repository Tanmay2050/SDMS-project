<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class achievement extends Model
{   
    public $timestamps = false;

    public $table = 'achieveadd';
    protected $fillable = [
        'name',
        'roll',
        'dept',
        'year',
        'activity',
        'award',
        'certificate',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
