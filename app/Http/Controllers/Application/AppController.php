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

    public function provideAdmin()
    {
        return view('layouts/admin');
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
            case 'signInAdmin.html':
                return view('admin/login');
            case 'home-admin.html':
                return view('admin/home-admin');
            case 'header.html':
                return view('layouts/header');
            case 'footer.html':
                return view('layouts/footer');
            case 'sidebar.html':
                return view('layouts/sidebar');
            case 'users.html':
                return view('admin/users');
            case 'orders.html':
                return view('admin/orders');
            case 'books.html':
                return view('admin/books');
        }
    }

    public function frontendTemplate($view)
    {
        switch($view){

        }
    }

}