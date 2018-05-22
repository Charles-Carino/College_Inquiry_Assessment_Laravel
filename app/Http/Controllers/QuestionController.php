<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\CollegeAnsKey;
class QuestionController extends Controller
{
    public function index(){
        $question = Question::all();
        return view('front-view.assessment',compact('question'));
    }

    public function index_admin(){
        $question = Question::all();

        return view('admin.questions',compact('question'));
    }
}
