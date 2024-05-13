<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function customerlist(){
        return View('backend.pages.customer.list');
    }
}
