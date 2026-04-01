<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'fullname',
        'date_of_birth',
        'gender',
        'image',
        'major_id'
    ];

    public function major() {

        return $this->belongsTo(Major::class);

    }

}



