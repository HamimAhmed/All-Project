<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontened.home');
    }

    public function showcategorylist()
    {
        $data=[];
       return view('frontened.category',$data) ;
    }
}
