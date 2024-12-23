<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'Name_Of_The_Student',
        'Roll_no',
        'Branch',
        'Year_Of_Study',
        'Title_Of_Course',
        'Organizing_Body',
        'Duration'
    ];
}
