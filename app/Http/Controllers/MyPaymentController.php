<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyPaymentController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::id();
        $orders = DB::table('orders')
            ->where('user_id', '=', $user_id)
            ->where('status', '=', 'PAYMENT COMPLETED')
            ->select('homework_id')
            ->get();
            $homework_id = [];
            foreach ($orders as $order){
                array_push($homework_id, $order->homework_id);

            }
            $homework = DB::table('homework')
            ->whereIn('id', $homework_id)
            ->get();

        return view('client.myHomework', compact('homework'));
    }

    public function show($id){
        $homework = Homework::find($id);
        return view('client.showMyAnswer', compact('homework'));
    }

    public function myOrder(){
        $user_id = Auth::id();
        $payments = DB::table('payments')
            ->join('orders', 'orders.order_id', '=','payments.order_id')
            ->where('payments.user_id', '=', $user_id)
            ->where('payments.status', '=', 'PAYMENT COMPLETED')
            ->select('orders.amount','payments.order_id','payments.payer_email', 'payments.created_at', 'payments.status')
            ->get();

        //not a very efficient way of getting the sum of amount TODO Fix this
        $totals = DB::table('payments')
            ->join('orders', 'orders.order_id', '=','payments.order_id')
            ->where('payments.user_id', '=', $user_id)
            ->where('payments.status', '=', 'PAYMENT COMPLETED')
            ->sum('orders.amount');

        return view('client.myBill', compact('payments', 'totals'));
    }
}
