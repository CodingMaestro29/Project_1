<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cart;
use App\Models\Student;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';


    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'payment_method',
        'email',
        'payment_id',
        'status',
        'amount',
       ];


       public function cart(){
           return $this->belongsTo(Cart::class, 'product_id');
       }


       public function user(){
        return $this->belongsTo(Student::class ,'user_id');
    }


    protected $dispatchesEvents = [
        'created' => \App\Events\PaymentMade::class,
    ];



}
