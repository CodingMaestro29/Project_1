<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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



}
