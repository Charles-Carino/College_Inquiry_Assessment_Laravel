<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultTable extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'question_id','answer'
    ];
}
