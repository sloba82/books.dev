<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{

    public function __construct()
    {
        App::setLocale('sr');
    }


    public function provideFrontend()
    {
        return view('master');
    }

    public function provideBackend()
    {
        return view('layouts/backend');
    }


    public function choseSubTemplate($viewName)
    {
        switch ($viewName){
            case 'home.html':
                return view('home');
            case 'book-view.html':
                return view('book-view');
            case 'profile.html':
                return view('profile');
            case 'basket.html':
                return view('basket');
            case 'contact.html':
                return view('contact');
            case 'signIn.html':
                return view('login');
            case 'forgot-password.html':
                return view('forgot-password');
            case 'password-recovery.html':
                return view('password-recovery');
        }
    }

    public function frontendTemplate($view)
    {
        switch($view){

        }
    }

}