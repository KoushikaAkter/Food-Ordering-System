<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderList() {
        $list = Order::with(['customer', 'orderDetails'])->get();
        // dd($list);
        return view('backend.pages.order.list', compact('list'));
    }

    public function reportList()
{
    $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
    $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

    $topFood = OrderDetail::select('foods.name', DB::raw('SUM(order_details.quantity) as total_quantity'))
        ->join('foods', 'order_details.food_id', '=', 'foods.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
        ->groupBy('foods.name')
        ->orderBy('total_quantity', 'DESC')
        ->first();

    // dd($topFood);
    $orders = Order::query();
   

    if (\request()->from_date && \request()->to_date) {
        $from_date = Carbon::createFromFormat('Y-m-d', \request()->from_date)->startOfDay();
        $to_date = Carbon::createFromFormat('Y-m-d', \request()->to_date)->endOfDay();
       
        
        $orders->whereBetween('created_at', [$from_date, $to_date]);
    }
    else{
        $orders->whereBetween('created_at', [Carbon::now()->subDays(90)->startOfDay(), Carbon::now()->endOfDay()]);
    }
    $list = $orders->with(['customer', 'orderDetails'])->latest()->get();
    
    return view('backend.pages.report.list', compact('topFood','list'));
}


}
