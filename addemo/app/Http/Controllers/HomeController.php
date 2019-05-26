<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slides;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slides::all();
        return view('home', compact("slides"));
    }

    public function poll_slides(){
        $slides = Slides::all();
        return $slides;
    }
}
