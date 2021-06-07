<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    //
    public static function environment()
    {

        $clientId = getenv("PAYPAL_SANDBOX_CLIENT_ID");
        $clientSecret = getenv("PAYPAL_SANDBOX_CLIENT_SECRET");
        return new SandboxEnvironment($clientId, $clientSecret);
    }

    public function payment(Request $request)
    {
        $data = [];
        $data['purchase_units'] = [
            [
                'name' => 'homework-support.com',
                'desc'  => 'Being The Procurement of Homework Answer',
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => $request->amount
                ]
            ]
        ];
        $data['intent'] = 'CAPTURE';
        $data['application_context'] = [
            'return_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel')
        ];

        $paypal = new PayPalHttpClient(self::environment());
        $OrderRequest = new OrdersCreateRequest();
        $OrderRequest->prefer('return=representation');
        $OrderRequest->body = $data;
        $response = response()->json($paypal->execute($OrderRequest));
        $content = $response->getOriginalContent();

        if($content->result->status === 'CREATED'){
            $order = new Order;
            $order->order_id = $content->result->id;
            $order->user_id = Auth::id();
            $order->homework_id = $request->homework_id;
            $order->amount = $request->amount;
            $order->status = 'PENDING PAYMENT';
            $order->customization = True;
            $order->save();
        }
        return $response;
    }

    public function success(Request $request)
    {
        $paypal = new PayPalHttpClient(self::environment());
        $orderID = $request->input('orderId');
        $request = new OrdersCaptureRequest($orderID);
        $response = response()->json($paypal->execute($request));

        $content = $response->getOriginalContent();
        if($content->result->status === 'COMPLETED'){
//            Save the payment details to payment table
            $payment = new Payment;
            $payment->order_id = $orderID;
            $payment->status = 'PAYMENT COMPLETED';
            $payment->payer_email = $content->result->payer->email_address;
            $payment->payer_order_id = $content->result->id;
            $payment->user_id = Auth::id();
            $payment->save();

//            Update Order status to payment completed
                DB::table('orders')
                ->where('order_id', $orderID)
                ->update(['status' => 'PAYMENT COMPLETED']);
        }
        return $response;
    }

    public function downloadAnswer($orderID)
    {
        $order_id = strip_tags($orderID);
        $user_id = Auth::id();

        $payment = Payment::where('order_id', $order_id)->where('user_id', $user_id)->get();
        if($payment[0]->status === 'PAYMENT COMPLETED'){
//            get homework_id
            $homework = Order::where('order_id', $order_id)->get();
//                DB::table('orders')->select('homework_id','customization')->where('order_id', $order_id)->get();
            //get home files
            $homework_files = DB::table('homework_files')
                ->where('homework_id','=',$homework[0]->homework_id)
                ->where('Answer', '=', True)
                ->get();
            return view('client.downloadAnswer', compact('homework_files', 'homework'));
        }

     return view('client.paymentCancelled');
    }
    public function cancel()
    {
        return view('client.paymentCancelled');
    }
}
