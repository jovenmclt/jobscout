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
}
