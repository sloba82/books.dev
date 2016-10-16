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
Route::get('/admin', 'Application\AppController@provideAdmin');
//Choose sub template
Route::get('/views/{viewName}', 'Application\AppController@choseSubTemplate');
//Request reset password
Route::post('/requestresetpassword', 'UserController@requestresetpassword');
//Reset password
Route::post('/resetpassword', 'UserController@resetpassword');
Route::get('/password-recover/{secret_token}', function ($secret_token) {
    return view('password-recovery', ['secret_token'=>$secret_token]);
});
Route::post('/check-email', 'UserController@checkEmail');
//Home
Route::get('/home', 'HomeController@getAllBooks');
Route::get('/home/book/{id}', 'HomeController@getBook');
Route::post('/home/user', 'HomeController@createUser');
//insert books to database
Route::post('create', 'BookController@create');


Route::group(['middleware' => ['jwt.auth','permission'], 'roles' => ['admin, user']], function () {

    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('book', 'BookController');
    Route::resource('role', 'UserRoleController');

});

Route::group(['middleware' => ['jwt.auth','permission'], 'roles' => ['user']], function () {

    //TODO all functionality for profile page with frontend!
    Route::get('/profile', 'UserController@getUserFromJWT');
    //TODO all functionality for basket page with frontend!
    Route::get('/basket', 'OrderController@getBasket');
//    Route::get('/contact', 'ContactController@sendMail');

});

