<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'collegeCode', 'collegeName','collegeAboutInfo', 'collegeDean', 'collegeEmail', 'collegePhoneNumber',
    ];
    public function degree(){
        return $this->hasMany(Degree::class);
    }
}
