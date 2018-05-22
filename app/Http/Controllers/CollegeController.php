<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\Degree;
class CollegeController extends Controller
{
    public function index(){
        $college = College::all();

        foreach($college as $col):
            $col->collegeAboutInfo = $this->getWords($col->collegeAboutInfo);
        endforeach;

        return view('front-view.colleges',compact('college'));
    }

    public function getWords($aboutInfo,$count = 20){
      preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $aboutInfo, $matches);
      return $matches[0];
    }

    public function show(College $college){
        return view('front-view.collegeDetail',compact('college'));
    }

    public function index_admin(){
        $college = College::all();

        return view('admin.colleges',compact('college'));
    }

    public function firstFour(){
        $c = College::where('id','<=',4)->get();

        foreach($c as $col):
            $col->collegeAboutInfo = $this->getWords($col->collegeAboutInfo);
        endforeach;

        return view('front-view.welcome',compact('c'));
    }
}
