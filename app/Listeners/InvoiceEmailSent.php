<?php

namespace App\Listeners;

use App\Events\PaymentMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentNotifyEmail;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceEmailSent  implements ShouldQueue
{

    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentMade $event)
    {
        $order = $event->order;

        $cart = $order->cart;

        $student = $order->user;

        $payment_id = $order->product_id;
        $payment_method =  $order->payment_method;
        $email =  $order->email;
        $status =  $order->status;
        $amount =  $order->amount;
        $date =  $order->created_at->format('F j, Y');;
        $product_name = $cart->product_name;
        $quantity = $cart->quantity;
        $name =  $student->fname.' '.$student->mname.' '.$student->lname;
        $address = $student->address;
        $city = $student->city;
        $state = $student->states;
        $zipcode = $student->zipcode;




        $formData = [
            'payment_id' =>  $payment_id ,
            'payment_method' =>  $payment_method ,
            'email' => $email,
            'status' =>  $status,
            'amount' => $amount,
            'product_name' => $product_name,
            'quantity' =>  $quantity,
            'date' =>  $date,
            'name' =>  $name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,

           ];


           
           $pdf = Pdf::loadView('email.invoice-email', ['formData' => $formData]);

        
           $pdfPath = storage_path('app/public/invoice.pdf');
           $pdf->save($pdfPath);

           $mail = new PaymentNotifyEmail($formData);

           $mail->attach($pdfPath);

           Mail::to([$email, 'companyuiux@gmail.com'] )->send($mail);

       //    Mail::to('companyuiux@gmail.com')->send($mail);


        // Mail::to($email)->send(new PaymentNotifyEmail($formData))->attach($pdfPath);




    }
}
