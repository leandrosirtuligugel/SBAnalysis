<?php

namespace SBAnalysis\Http\Controllers;

use Illuminate\Http\Request;

use SBAnalysis\Http\Requests;
use SBAnalysis\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public  function index(){
        return view('dashboard');
    }
}
