<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\CollegeAnsKey;
use App\Degree;
use App\Question;
use App\ResultTable;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->userType == 'admin'){
            return redirect('/home/dashboard');
        }
        else{
            $c = College::where('id','<=',4)->get();

            foreach($c as $col):
                $col->collegeAboutInfo = $this->getWords($col->collegeAboutInfo);
            endforeach;

            return view('front-view.welcome',compact('c'));
        }
    }
    public function getWords($aboutInfo,$count = 20){
      preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $aboutInfo, $matches);
      return $matches[0];
    }
}
