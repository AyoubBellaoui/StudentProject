<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'fullname',
        'date_of_birth',
        'gender',
        'major_id'
    ];
}
