<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    function getList(){
        $slide = Slide::all();
        return view('page.trangchu',compact('slide'));
    }
}
