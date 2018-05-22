<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'college_id', 'degreeCode','degreeDesc', 'degreeJobs'
    ];
    public function college(){
        return $this->belongsTo(College::class);
    }
}
