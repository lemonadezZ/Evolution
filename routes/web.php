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

Route::get('/', function () {
    return view('welcome');
});













Route::get('/help', function () {
   	return \Evolution\Conf::Name('AppName');
});
//获取图片验证码
Route::get('/captcha', function () {
	header('Content-type: image/jpeg');
 	$builder = new \Gregwar\Captcha\CaptchaBuilder();
	$builder->build();
	session(['phrase'=>$builder->getPhrase()]);
	$builder->output();
});
//获取短信验证码逻辑
Route::any('/sendSMScode/{phone}/{captcha}', function ($phone,$captcha) {
	if($phone=="" || $captcha==""){
		return fail();
	}
	if(session('phrase')!=$captcha){
		return fail();
	}
	//TODO sendSMScode
	return success();
});

Route::get('/setlang/{locale}', function ($locale) {
    App::setLocale($locale);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
