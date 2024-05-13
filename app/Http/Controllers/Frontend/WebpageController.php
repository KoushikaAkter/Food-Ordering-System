<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    public function homepage()
    {

        $foods=Food::limit(9)->get();
        return view('frontend.pages.homepage',compact('foods'));
    }
    public function about_us()
    {
        return view('frontend.pages.about_us.about_us');
    }
}
