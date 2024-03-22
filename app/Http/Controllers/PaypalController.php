<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentCompletion;
use App\Models\Student;
use Exception;
use App\PaypalCheckout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    public function index()
    {
        return view('payment');
    }

        public function paypal(Request $request)
        {
            $provider = new PayPalClient;
            $config = config('paypal');
            $provider->setApiCredentials($config);
             $token = $provider->getAccessToken();

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ],

            "application_context" => [
                'return_url' => route('success'),
                'cancel_url' => route('cancel')
            ]
        ]);

        if ($order['status'] == 'CREATED') {
            $userId = auth()->user()->id;
            $email = auth()->user()->email;
            Cart::create([
                'user_id' => $userId,
                'product_name' =>  $request->product_name,
                'price' =>  $request->price,
                'quantity' =>  $request->quantity,
                'payment_method' =>  'Paypal',
                'email' => $email,
                'status' =>  Cart::STATUS['in_process'],
                'payment_id' => $order['id'],
            ]);

                    if(isset($order['id']) && $order['id']!=null){
                        foreach($order['links'] as $link){
                            if($link['rel'] == 'approve'){
                                return redirect()->away($link['href']);
                            }
                        }
        
                     }
        
             }

          //   return redirect($order['links'][1]['href']);
            
        }


        public function success(Request $request)
        {
            //  dd('success');
            $provider = new PayPalClient;
            $config = config('paypal');
            $provider->setApiCredentials($config);
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);

        //   return redirect($order['links'][1]['href']);

    }


    public function success(Request $request)
    {
        //  dd('success');
        $provider = new PayPalClient;
        $config = config('paypal');
        $provider->setApiCredentials($config);
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        //   dd( $response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $items = Cart::where([
                'user_id' => auth()->user()->id,
                'payment_id' => $response['id']
            ])
                ->get();

            foreach ($items as $item) {
                Order::create([
                    'user_id' => auth()->user()->id,
                    'product_id' =>  $item->id,
                    'payment_method' =>  'Paypal',
                    'email' =>  auth()->user()->email, 
                    'payment_id' =>   $item->payment_id,
                    'status' =>  Cart::STATUS['success'],
                    'amount' =>  $item->price,
                ]);

                $item->status = Cart::STATUS['success'];
                $item->save();
            }

            $user = Student::where('email', auth()->user()->email)->first();

            StudentCompletion::create([
                'user_id' => auth()->user()->id,
                'fname' =>  $user->fname,
                'mname' =>  $user->mname,
                'lname' =>  $user->lname,
                'DOB' =>  $user->date . ',' . $user->month . ',' . $user->years,
                'email' =>  $user->email,
                'license_number' =>  $user->licensenumber,
                'complete_time' => today(),
                'address' =>  $user->address,
                'state' =>  $user->states,
                'zipcode' =>  $user->zipcode,
            ]);

            return redirect()->route('payment')->with('success', 'payment done successfully');
        }

        return redirect()->route('payment')->with('error', $response['message'] ?? 'something went wrong');
    }


    public function  cancel(Request $request)
    {

        if ($request->token) {
            (new Cart)->where('payment_id', $request->token)
                ->update([
                    'payment_id' => '',
                    'status' =>  Cart::STATUS['pending']
                ]);
        }

        return redirect()->route('payment')->with('error', 'Your payment has been cancelled');
    }





    public function card_pay()
    {
        return view('card');
    }


    public function card_pay_process(Request $request)

    {

        $itemName = "Mature Driver";
        $itemPrice = 17.95;
        $quantity = 1;
        $currency = "USD";

        $paypal = new PaypalCheckout;

        $response = ['status' => 0, 'msg' => 'Request Failed!'];
        $api_error = '';

        // dd($request->request_type );

        if ($request->filled('request_type') && $request->request_type == 'create_order') {
            //  if ($request->request_type == 'create_order') {
            $payment_source = $request->payment_source;

            $product_data = [
                'item_name' => $itemName,
                'price' =>  $itemPrice,
                'quantity' => $quantity,
                'currency' =>  $currency,
            ];



            // Create order with PayPal Orders API
            try {

                $order = $paypal->createOrder($product_data, $payment_source);

                // Log::info(' order: ' .  $order);

            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (!empty($order)) {

                $userId =  Auth::guard('student')->user()->id;
                $email =  Auth::guard('student')->user()->email;
                Cart::create([
                    'user_id' => $userId,
                    'product_name' =>   $itemName,
                    'price' =>  $itemPrice,
                    'quantity' =>  $quantity,
                    'payment_method' =>  'Credit_card',
                    'email' => $email,
                    'status' =>  Cart::STATUS['in_process'],
                    'payment_id' => $order['id'],
                ]);
                $response = ['status' => 1, 'data' => $order];
                return response($response);
                //  Log::info('response: ' . json_encode($order));
            } else {
                $response['msg'] = $api_error;
            }
            Log::info('Test2: ' . 311);
        } else if ($request->filled('request_type') && $request->request_type == 'capture_order') {


            Log::info('Test: ' . 111);

            $order_id = $request->order_id;

            // Capture order with PayPal Orders API
            try {
                $order = $paypal->captureOrder($order_id);
                Log::info('Test11: ' . 211);
            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (!empty($order)) {
                $order_id = $order['id'];
                $order_status = $order['status'];

                // Extract payment source data
                $payment_source = '';
                $payment_source_card_name = '';
                $payment_source_card_last_digits = '';
                $payment_source_card_expiry = '';
                $payment_source_card_brand = '';
                $payment_source_card_type = '';

                if (!empty($order['payment_source'])) {
                    foreach ($order['payment_source'] as $key => $value) {
                        $payment_source = $key;
                        if ($payment_source == 'card') {
                            $payment_source_card_name = $value['name'];
                            $payment_source_card_last_digits = $value['last_digits'];
                            $payment_source_card_expiry = $value['expiry'];
                            $payment_source_card_brand = $value['brand'];
                            $payment_source_card_type = $value['type'];
                        }
                    }
                }

                // Extract purchase unit data
                $transaction_id = '';
                $payment_status = '';
              //  $quantity = '';
                $amount_value = '';
                $currency_code = '';
                $create_time = '';

                if (!empty($order['purchase_units'][0])) {
                    $purchase_unit = $order['purchase_units'][0];
                    if (!empty($purchase_unit['payments'])) {
                        $payments = $purchase_unit['payments'];
                        if (!empty($payments['captures'])) {
                            $captures = $payments['captures'];
                          //  dd($captures[0]);
                            if (!empty($captures[0])) {
                                $transaction_id = $captures[0]['id'];
                                $payment_status = $captures[0]['status'];
                             //   $quantity = $captures[0]['quantity'];
                                $amount_value = $captures[0]['amount']['value'];
                                $currency_code = $captures[0]['amount']['currency_code'];
                                $create_time = date('Y-m-d H:i:s', strtotime($captures[0]['create_time']));
                            }
                        }
                    }
                }

                if (!empty($order_id) && $order_status == 'COMPLETED') {



                    $items = Cart::where([
                        'user_id' => Auth::guard('student')->user()->id,
                        'payment_id' =>  $order['id']
                    ])
                        ->get();


                    foreach ($items as $item) {

                        Order::create([
                            'user_id' => Auth::guard('student')->user()->id,
                            'product_id' =>  $item->id,
                            'payment_method' =>  'credit_card',
                            'email' =>  Auth::guard('student')->user()->email,
                            'payment_id' =>   $item->payment_id,
                            'status' =>  Cart::STATUS['success'],
                            'amount' =>  $item->price,
                        ]);

                        $item->status = Cart::STATUS['success'];
                        $item->save();
                    }



                    $user = Student::where('email', Auth::guard('student')->user()->email)->first();

                    StudentCompletion::create([
                        'user_id' => Auth::guard('student')->user()->id,
                        'fname' =>  $user->fname,
                        'mname' =>  $user->mname,
                        'lname' =>  $user->lname,
                        'DOB' =>  $user->date . ',' . $user->month . ',' . $user->years,
                        'email' =>  $user->email,
                        'license_number' =>  $user->licensenumber,
                        'complete_time' => today(),
                        'address' =>  $user->address,
                        'state' =>  $user->states,
                        'zipcode' =>  $user->zipcode,
                    ]);

                   

                     return response()->json([
                        "status" => 1,
                        "msg" => 'Transaction completed!'
                    ]);

                 }


           }
        }
    }





}
