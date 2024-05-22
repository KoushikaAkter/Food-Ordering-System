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
    return view('backend.pages.report.list', compact('topFood'));
}


}
