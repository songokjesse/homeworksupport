<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    //
    public function index(){
        $orders = Order::all();
        //not a very efficient way of getting the sum of amount TODO Fix this
        $totals = DB::table('orders')
            ->where('status', '=', 'PAYMENT COMPLETED')
            ->sum('amount');
        return view('admin.billing.index', compact('orders', 'totals'));
    }
}
