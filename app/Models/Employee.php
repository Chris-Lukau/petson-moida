<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'bi_number',
        'gender',
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}