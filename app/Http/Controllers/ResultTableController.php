<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResultTable;
use App\User;
use App\College;
use App\Question;
use Auth;
use DB;
class ResultTableController extends Controller
{
    public function index_admin(){
        $results = ResultTable::join('users', 'users.id', '=', 'result_tables.user_id')->join('questions', 'questions.id', '=', 'result_tables.question_id')->get();
        return view('admin.results',compact('results'));
    }

    public function results(Request $request){
        $finalMax = json_decode($request['recCollege']);
        $questions = Question::pluck('id');
        $temp = json_decode($request['tempResultTable']);
        if(Auth::check()){
            $codes = College::select(DB::raw('group_concat(collegeCode) as codes'))
                        ->whereIn('id', $finalMax)
                        ->get();
            User::where('id',Auth::user()->id)->update([
                'resultCollege' => collect($codes)->implode('codes',', ')
            ]);
            if(Auth::user()->resultCollege == NULL){
                $i = 0;
                foreach ($temp as $key){
                    ResultTable::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $questions[$i],
                        'answer' => $key
                    ]);
                    $i++;
                }
                $names = $this->names($finalMax);
                return $names;
            }
            else{
                $i = 0;
                foreach ($temp as $key){
                    ResultTable::where('user_id',Auth::user()->id)->update([
                        'user_id' => Auth::user()->id,
                        'question_id' => $questions[$i],
                        'answer' => $key
                    ]);
                    $i++;
                }
                $names = $this->names($finalMax);
                return $names;
            }
        }
        else
            $names = $this->names($finalMax);
            return $names;
    }

    public function names($finalMax){
        $names = College::select(DB::raw('group_concat(collegeName) as names'))
                    ->whereIn('id', $finalMax)
                    ->get();
        return $names;
    }
}
