<?php

namespace App\Http\Controllers;

use App\Models\Homework;
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
}
