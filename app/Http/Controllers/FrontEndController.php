<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //

    public function index(){
        return Inertia::render('Index/Index');
    }

    public function RegisterAccount(){
        return Inertia::render('Index/RegisterAccount');
    }

    public function LoginAccount(){
        return Inertia::render('Index/LoginAccount');
    }
}
