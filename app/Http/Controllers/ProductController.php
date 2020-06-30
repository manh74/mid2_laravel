<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getList(){
        $product = Product::where('new', 1);
        return view('page.trangchu',compact('product'));
    }
}
