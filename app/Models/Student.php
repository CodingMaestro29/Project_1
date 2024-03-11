<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

//class Student extends Model
class Student extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'id',
        'fname',
        'mname',
        'lname',
        'email',
        'date',
        'month',
        'years',
        'number11',
        'number12',
        'number13',
        'licenseState',
        'licensenumber',
        'username',
        'password',
        'password_confirmation',
        'address',
        'city',
        'states',
        'zipcode',
        'find',
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


}
