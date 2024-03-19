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
        'user_id',
        'fname',
        'mname',
        'lname',
        'DOB',
        'email',
        'license_number',
        'complete_time',
        'address',
        'state',
        'zipcode',
        ];



        public function user()
        {
            return $this->belongsTo(Student::class, 'user_id');
        }

        protected $dispatchesEvents = [
            'created' => \App\Events\CourseCompleted::class,
        ];


}
