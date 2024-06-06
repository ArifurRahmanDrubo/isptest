<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    function index(){
        return Inertia::render('App');
    }
}
