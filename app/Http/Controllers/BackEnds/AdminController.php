<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('BackEnds.Partials.home.home');
    }
}
