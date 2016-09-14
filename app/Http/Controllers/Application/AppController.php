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
            case 'signIn.html':
                return view('login');
        }
    }

    public function frontendTemplate($view)
    {
        switch($view){

        }
    }

}