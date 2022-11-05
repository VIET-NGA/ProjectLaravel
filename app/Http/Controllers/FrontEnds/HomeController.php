<?php

namespace App\Http\Controllers\FrontEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Trang Chủ
    public function index(){
        return view('Partials.home.home');
    }

    // Liên hệ
    public function contact(){
        return view('Partials.contact.contact');
    }

    // loginPage
    public function login(){
        return view('login');
    }
}
