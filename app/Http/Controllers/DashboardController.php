<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        session()->flash('add','welcome');
       // dd(session());
        return view('adminPanel');
    }
}
