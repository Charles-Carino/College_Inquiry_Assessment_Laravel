<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','CollegeController@firstFour');
Route::get('/about', function () {
    return view('front-view.about');
});

Route::get('/help', function () {
    return view('front-view.help');
});
Route::get('/colleges','CollegeController@index');
Route::get('colleges/{college}','CollegeController@show');
Route::get('/assessment','QuestionController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/dashboard','AdminController@dashboard');
Route::get('/home/users','UserController@index_admin');
Route::get('/home/colleges','CollegeController@index_admin');
Route::get('/home/degrees','DegreeController@index_admin');
Route::get('/home/questions','QuestionController@index_admin');
Route::get('/home/answers','CollegeAnsKeyController@index_admin');
Route::get('/home/results','ResultTableController@index_admin');
Route::post('/admin/add','AdminController@add');
Route::post('/admin/edit','AdminController@edit');
Route::post('/admin/delete','AdminController@delete');
Route::get('getObject','AdminController@getObject');
Route::get('fetchAnswers','CollegeAnsKeyController@showAll');
Route::get('drawGraph','AdminController@drawGraph');
Route::get('home/logout','AdminController@logout');
Route::get('userProfile/{user}','UserController@userData');
Route::post('sendImg','UserController@updateImg');
Route::post('result','ResultTableController@results');
