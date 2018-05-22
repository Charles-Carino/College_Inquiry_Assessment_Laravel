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
class AdminController extends Controller
{
    public function dashboard(){
        $count = array(
            'userCount' => User::count(),
            'collegeCount' => College::count(),
            'answerCount' => CollegeAnsKey::count(),
            'degreeCount' => Degree::count(),
            'questionCount' => Question::count(),
            'resultCount' => ResultTable::count()
        );
        return view('admin.dashboard')->with('count',$count);
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function getObject(){
        $c = College::all();
        $q = Question::all();

        $data = array(
            'table'=>strip_tags(trim($_GET['page']))
        );
        if($data['table'] == 'degrees')
            return $c;
        else if($data['table'] == 'answers'){
            $list = array(
                $c,
                $q
            );
            return $list;
        }
    }

    public function drawGraph(){
        $u = User::all();
        $v = $u->pluck('id');
        $data = array('colleges' => array());

        foreach($v as $key){

            $arr = explode(',', User::where('id',User::where('id',$key)->pluck('id'))->pluck('resultCollege')->implode(''));
            if(!empty($arr)){
                foreach($arr as $val){
                    if($val == NULL)
                        continue;
                    else
                        $data['colleges'][] = $val;
                }

            }
            else
                $data['colleges'][] = $u->resultCollege;
        }
        $newarr = array_count_values( $data['colleges']);

        return json_encode($newarr,JSON_FORCE_OBJECT);
    }

    public function add(Request $request){
        $data = array(
            'table'=> strip_tags(trim($request['page'])),
            'values'=> $request['values'],
            'avatar' => $request['avatar']
        );
        die();
        if($data['table'] == 'users'){
            User::create([
                'avatar' => $data['avatar'],
                'userType' => strip_tags(trim($data['values'][1])),
                'name' => strip_tags(trim($data['values'][2])),
                'username' => strip_tags(trim($data['values'][3])),
                'password' => bcrypt(strip_tags(trim($data['values'][4]))),
                'email' => strip_tags(trim($data['values'][5])),
                'resultCollege' => strip_tags(trim($data['values'][6])),
            ]);
        }
        else if($data['table'] == 'colleges'){
            College::create([
                'collegeCode' => strip_tags(trim($data['values'][0])),
                'collegeName' => strip_tags(trim($data['values'][1])),
                'collegeAboutInfo' => strip_tags(trim($data['values'][2])),
                'collegeDean' => strip_tags(trim($data['values'][3])),
                'collegeEmail' => strip_tags(trim($data['values'][4])),
                'collegePhoneNumber' => strip_tags(trim($data['values'][5])),
            ]);
        }
        else if($data['table'] == 'questions'){
            Question::create([
                'questionText' => strip_tags(trim($data['values'][0])),
            ]);
        }
        else if($data['table'] == 'degrees'){
            $collegeID = explode('-',$data['values'][0]);
            Degree::create([
                'college_id' => $collegeID[0],
                'degreeCode'=>strip_tags(trim($data['values'][2])),
                'degreeDesc'=>strip_tags(trim($data['values'][3])),
                'degreeJobs'=>nl2br(strip_tags(trim($data['values'][4]))),
            ]);
        }
        else if($data['table'] == 'answers'){
            $collegeID = explode('-',$data['values'][0]);
            $questionID = explode('-',$data['values'][1]);
            CollegeAnsKey::create([
                'college_id' => $collegeID[0],
                'question_id'=> $questionID[0],
                'answer'=>strip_tags(trim($data['values'][2]))
            ]);
        }
    }

    public function edit(Request $request){
        $data = array(
            'id'=>strip_tags(trim($request['ID'])),
            'table'=>strip_tags(trim($request['page'])),
            'values'=>$request['values']
        );
        print_r($data['values']);
        if($data['table'] == 'users'){
            if(User::where('id',$data['id'])->pluck('password') == $data['values'][4]){
                User::where('id',$data['id'])->update([
                    'password' => strip_tags(trim($data['values'][4]))
                ]);
            }
            else{
                User::where('id',$data['id'])->update([
                    'password' => bcrypt(strip_tags(trim($data['values'][4])))
                ]);
            }
            User::where('id',$data['id'])->update([
                'userType' => strip_tags(trim($data['values'][1])),
                'name' => strip_tags(trim($data['values'][2])),
                'username' => strip_tags(trim($data['values'][3])),
                'email' => strip_tags(trim($data['values'][5])),
                'resultCollege' => strip_tags(trim($data['values'][6])),
            ]);
        }
        else if($data['table'] == 'colleges'){
            College::where('id',$data['id'])->update([
                'collegeCode' => $data['values'][0],
                'collegeName' => $data['values'][1],
                'collegeAboutInfo' => $data['values'][2],
                'collegeDean' => $data['values'][3],
                'collegeEmail' => $data['values'][4],
                'collegePhoneNumber' => $data['values'][5],
            ]);
        }
        else if($data['table'] == 'questions'){
            Question::where('id',$data['id'])->update([
                'questionText' => $data['values'][0]
            ]);
        }
        else if($data['table'] == 'degrees'){
            $collegeID = explode('-',$data['values'][0]);
            Degree::where('id',$data['id'])->update([
                'college_id' => $collegeID[0],
                'degreeCode' => $data['values'][2],
                'degreeDesc' => $data['values'][3],
                'degreeJobs' => $data['values'][4],
            ]);
        }
        else if($data['table'] == 'answers'){
            CollegeAnsKey::where('id',$data['id'])->update([
                'college_id' => $data['values'][0],
                'question_id' => $data['values'][1],
                'answer' => $data['values'][2]
            ]);
        }
    }

    public function delete(Request $request){
        $data = array(
            'id' => $request['id'],
            'page' => $request['page']
        );
        if($data['page'] == 'users')
            User::where('id',$data['id'])->delete();
        else if($data['page'] == 'colleges')
            College::where('id',$data['id'])->delete();
        else if($data['page'] == 'degrees')
            Degree::where('id',$data['id'])->delete();
        else if($data['page'] == 'questions')
            Question::where('id',$data['id'])->delete();
        else if($data['page'] == 'answers')
            CollegeAnsKey::where('id',$data['id'])->delete();
    }
}
