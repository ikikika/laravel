<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(){
        $slides = Slides::all();
        return view('slides.index', compact("slides"));
    }
}
