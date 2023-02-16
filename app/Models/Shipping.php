<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'city',
        'country',
        'zipcode',
        
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
