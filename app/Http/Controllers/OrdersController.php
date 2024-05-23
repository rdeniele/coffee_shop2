<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_orders; 

class OrdersController extends Controller
{
    public function index()
    {
        $orders = tbl_orders::all();
        return view('orders', compact('orders'));
    }
}
