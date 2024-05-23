<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage()
    {
         $customer=Customer::count();
         $category=Category::count();
         $food=Food::count();
         $order=Order::count();
        //  dd($order);
        return view('backend.pages.dashboard',compact('customer','category','food','order'));
    }

}
