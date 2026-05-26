<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'pricing_type',
        'base_price',
        'requires_survey',
        'photo_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}