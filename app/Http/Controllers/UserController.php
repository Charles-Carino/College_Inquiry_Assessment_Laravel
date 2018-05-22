<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\College;
use App\Degree;
use Auth;
use Image;
class UserController extends Controller
{
    public function index_admin(){
        $user = User::all();

        return view('admin.users',compact('user'));
    }
    public function updateImg(Request $request){

        // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('img/uploads/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

        return redirect("/userProfile/$user->id");
    }

    public function userData(User $user){
        $codes = collect(User::where('id',$user->id)->pluck('resultCollege'))->implode(',');
        $arr = explode(',',$codes);
        $all = array();
        $i = 0;
        if($codes==NULL)
            return view('front-view.userProfile',compact('user'));
        else{
            foreach($arr as $key){
                $all[$i]['colleges'] = collect(College::where('collegeCode',$key)->get());
                $all[$i]['degrees'] = collect(Degree::where('college_id',$all[$i]['colleges']->pluck('id'))->get());
                $i++;
            }
            return view('front-view.userProfile',compact('user'))->with(compact('all'));
        }

    }


}
