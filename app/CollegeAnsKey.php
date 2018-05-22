<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeAnsKey extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'college_id', 'question_id','answer'
    ];
}
