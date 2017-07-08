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


// Admin routs
Auth::routes();


Route::group(['middleware' => ['web', 'admin']], function () {

//    Route::get('adminbannel/users/data', ['as'=>'adminbannel.users.data','use'=>'UsersController@anyData']);
    Route::get('/adminbannel', 'AdminController@index');
    Route::get('/adminbannel/buyear/status', 'AdminController@showyearsstatics');
    Route::post('/adminbannel/buyear/status', 'AdminController@showYearThis');
    Route::resource('/adminbannel/users', 'UsersController');
    Route::get('/users', 'UsersController@index');
    Route::get('/adminbannel/users/{id}/delete', 'UsersController@destroy');





//	siteSettings
    Route::get('/adminbannel/sitesettings', 'SiteSettingController@index');
    Route::post('/adminbannel/sitesettings', 'SiteSettingController@store');
// contact
    Route::resource('/adminbannel/contact', 'ContactController');
    Route::get('/adminbannel/contact/{id}/delete', 'ContactController@destroy');

//    buSittings
    Route::resource('/adminbannel/bu', 'buController',['except'=>['index','show']]);
    Route::get('adminbannel/bu/{id?}','buController@index');
    Route::get('/adminbannel/bu/{id}/delete', 'buController@destroy');
    Route::get('/adminbannel/change_status/{id}/{status}','buController@changestatus');

});


// user routs
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/logout',function (){
        Auth::logout();
        return view('/login');
    });


});


Route::get('showAllbu', 'buController@showAllEnable');
Route::get('/forrent', 'buController@forrent');
Route::get('/forbuy', 'buController@forbuy');
Route::get('/type/{type}', 'buController@showbytype');
//    search
Route::get('/search', 'buController@search');
Route::get('/singleBu/{id}', 'buController@showSingle');
Route::get('/ajax/bu/information', 'buController@getAjaxInfo');
Route::get('/user/bulandshow', 'buController@showUserbuild')->middleware('auth');
Route::get('/user/bulandshowWaiting', 'buController@showUserbuildWaiting')->middleware('auth');
Route::get('/user/usereditsitting', 'UsersController@userinfo')->middleware('auth');
Route::patch('/user/usereditsitting/{user}', 'UsersController@userupdateprofile')->middleware('auth');
Route::get('/user/editBu/{id}', 'buController@userEditeBuild')->middleware('auth');
Route::post('/user/create/bulding', 'buController@userupdateBuild')->middleware('auth');


Route::post('/user/changePassword/{id}', 'UsersController@changepass')->middleware('auth');


Route::get('/contact', 'HomeController@contact');
Route::post('/contact/add', 'ContactController@store');

Route::get('/', function () {
    return view('welcome');
});

//Add builds

Route::get('/user/create/bubuild', 'buController@userAddtoview');
Route::post('/user/create/bubuild', 'buController@userstore');








