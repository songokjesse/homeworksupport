<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

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

        if($content){
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
        return response()->json($paypal->execute($request));
    }

    public function downloadAnswer($id)
    {
        if(!$id){
            return redirect()->back();
        }

        return view('client.downloadAnswer');
    }
    public function cancel()
    {
        return view('client.paymentCancelled');
    }
}
