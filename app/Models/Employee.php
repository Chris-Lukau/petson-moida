<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'bi_number',
        'gender',
        'address',
        'service'
    ];
}