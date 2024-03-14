<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCompletion extends Model
{
    use HasFactory;

    protected $table = 'student_completions';

    protected $fillable = [
        'id',
        'fname',
        'mname',
        'lname',
        'DOB',
        'license_number',
        'complete_time',
        'address',
        'state',
        'zipcode',
        ];
}
