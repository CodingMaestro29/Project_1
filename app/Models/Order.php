<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';


    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'payment_id',
        'status',
        'amount',
       ];


       public function cart(){
           return $this->belongsTo(Cart::class);
       }


       public function user(){
        return $this->belongsTo(Student::class);
    }



}
