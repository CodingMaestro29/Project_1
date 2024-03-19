<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentCompletion;
use App\Models\Student;

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
                "purchase_units"=>[
                    [
                    "amount"=>[
                        "currency_code"=>"USD",
                        "value" =>$request->price
                    ]
                  ]
                    ],

                    "application_context"=>[
                        'return_url'=>route('success'),
                        'cancel_url'=>route('cancel')
                    ]
             ]);

             if($order['status'] == 'CREATED'){
                $userId = auth()->user()->id;
                $email = auth()->user()->email;
                Cart::create([
                    'user_id' => $userId,
                    'product_name' =>  $request->product_name,
                    'price' =>  $request->price,
                    'quantity' =>  $request->quantity,
                    'payment_method' =>  'Paypal',
                    'email'=>$email,
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

          //   dd( $response);

             if(isset($response['status']) && $response['status']== 'COMPLETED'){
                $items = Cart::where([
                    'user_id'=>auth()->user()->id,
                    'payment_id' => $response['id']
                ])
                ->get();
                
              foreach($items as $item){
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

                $user = Student::where('email' ,auth()->user()->email )->first();

                StudentCompletion::create([
                    'user_id' => auth()->user()->id,
                    'fname' =>  $user->fname,
                    'mname' =>  $user->mname,
                    'lname' =>  $user->lname,
                    'DOB' =>  $user->date.','.$user->month.','.$user->years,
                    'email' =>  $user->email,
                    'license_number' =>  $user->licensenumber,
                    'complete_time' => today(),
                    'address' =>  $user->address,
                    'state' =>  $user->states,
                    'zipcode' =>  $user->zipcode,
                ]);

                return redirect()->route('payment')->with('success','payment done successfully');
             }

             return redirect()->route('payment')->with('error',$response['message'] ?? 'something went wrong'); 
            
        }


        public function  cancel(Request $request)
        {

            if($request->token){
                (new Cart)->where('payment_id',$request->token )
                ->update([
                    'payment_id'=>'',
                    'status' =>  Cart::STATUS['pending']
              ]);
            }

            return redirect()->route('payment')->with('error', 'Your payment has been cancelled'); 

         }



}
