<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollegeAnsKey;
use App\College;
class CollegeAnsKeyController extends Controller
{
    public function index_admin(){
        $anskey = CollegeAnsKey::join('colleges', 'colleges.id', '=', 'college_ans_keys.college_id')->join('questions', 'questions.id', '=', 'college_ans_keys.question_id')->get();

        return view('admin.answers',compact('anskey'));
    }

    public function showAll(){
        $ans = [];
        for($i = 0;$i < College::count();$i++)
            $ans[$i] = CollegeAnsKey::where('college_id',$i+1)->orderBy('question_id','asc')->orderBy('college_id','asc')->pluck('answer');

        return json_encode($ans);
    }

}
