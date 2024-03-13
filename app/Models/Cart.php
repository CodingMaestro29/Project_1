<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';


    protected $fillable = [
        'id',
        'user_id',
        'product_name',
        'price',
        'quantity',
        'status',
        'payment_id',
        
    ];

    const STATUS = [
        'pending' => 0,
        'in_process' => 1,
        'success' => 2,
        'error' => 3
    ];

    public function user()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }


}
