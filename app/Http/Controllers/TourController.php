<?php

namespace App\Http\Controllers;
use App\Tour;
use App\Http\Requests\TourRequest;
use Illuminate\Http\Request;

class TourController extends Controller
{
    function getList(){
        $tours = Tour::all();
        return view('tour',compact('tours'));
    }

    public function getAdd(){
        return view('add-tour');
    }

    public function postAdd(TourRequest $request){
		$tour = new Tour();
        $tour->name = $request->name;
        $file = $request->file('uploadFile')->getClientOriginalName();
        $tour->image = $request->file('uploadFile')->move('public/img/',$file);
        $tour->image = 'public/img/'.$file;
        $tour->depart = $request->depart;
        $tour->typetour = $request->typetour;
        $tour->schedule = $request->schedule;
        $tour->number = $request->number;
        $tour->price = $request->price;
		$tour->save();
		return redirect('/tour')->with('success', 'Add tour successed!');;
    }

}
