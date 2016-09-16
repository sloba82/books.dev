<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Authentication
Route::post('/authenticate', 'Auth\AuthController@authenticate');
// Provide Template
Route::get('/', 'Application\AppController@provideFrontend');
Route::get('/backend/', 'Application\AppController@provideBackend');
//Choose sub template
Route::get('/views/{viewName}', 'Application\AppController@choseSubTemplate');
Route::get('/frontend/{viewName}', 'Application\AppController@frontendTemplate');
//Request reset password
Route::post('/requestresetpassword', 'UserController@requestresetpassword');
//Reset password
Route::post('/resetpassword', 'UserController@resetpassword');
Route::get('/password-recover/{secret_token}', function ($secret_token) {
    return view('password-recovery', ['secret_token'=>$secret_token]);
});
//Check if mail exists
Route::post('/checkEmailExists', 'UserController@checkEmail');
//Home
Route::get('/home', 'HomeController@home');
//TODO all functionality for home page with frontend!

Route::group(['middleware' => ['jwt.auth']], function () {


    Route::get('/profile', 'UserController@getUserFromJWT');
    Route::get('/basket', 'OrderController@getBasket');
    //TODO all functionality for basket page with frontend!

    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('book', 'BookController');

});

