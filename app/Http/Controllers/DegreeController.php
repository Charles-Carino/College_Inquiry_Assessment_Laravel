<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degree;
use App\College;
class DegreeController extends Controller
{
    public function index_admin(){
        $degree = College::join('degrees', 'degrees.college_id', '=', 'colleges.id')->get();

        return view('admin.degrees',compact('degree'));
    }
}
