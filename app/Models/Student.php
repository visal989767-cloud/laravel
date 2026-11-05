<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentid';

    protected $fillable = [
        'studentname',
        'gender',
        'age',
        'dob',
        'subject',
        'payment',
        'description',
    ];
}
