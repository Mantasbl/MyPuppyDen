<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;
use Storage;
use User;
use Auth;
use authAdminController;
use Web;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->take(4)->get();
        $featuredproduct = Product::where('isFeatured', 1)->take(1)->get();
        return view('home',compact('products', 'featuredproduct'));
    }
}
