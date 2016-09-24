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
        return view('layouts/user/master');
    }

    public function provideAdmin()
    {
        return view('layouts/admin/admin');
    }


    public function choseSubTemplate($viewName)
    {
        switch ($viewName){
            case 'home.html':
                return view('user/home');
            case 'book-view.html':
                return view('user/book-view');
            case 'profile.html':
                return view('user/profile');
            case 'basket.html':
                return view('user/basket');
            case 'contact.html':
                return view('user/contact');
            case 'signIn.html':
                return view('user/login');
            case 'forgot-password.html':
                return view('forgot-password');
            case 'password-recovery.html':
                return view('password-recovery');
            case 'signInAdmin.html':
                return view('admin/login');
            case 'home-admin.html':
                return view('admin/home-admin');
            case 'header.html':
                return view('layouts/admin/header');
            case 'footer.html':
                return view('layouts/footer');
            case 'header_front.html':
                return view('layouts/user/header_front');
            case 'users.html':
                return view('admin/users');
            case 'user-create.html':
                return view('admin/user-create');
            case 'user-edit.html':
                return view('admin/user-edit');
            case 'orders.html':
                return view('admin/orders');
            case 'order-create.html':
                return view('admin/order-create');
            case 'order-edit.html':
                return view('admin/order-edit');
            case 'books.html':
                return view('admin/books');
            case 'book-create.html':
                return view('admin/book-create');
            case 'book-edit.html':
                return view('admin/book-edit');
        }
    }

    public function frontendTemplate($view)
    {
        switch($view){

        }
    }

}