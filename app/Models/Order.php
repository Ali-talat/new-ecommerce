<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table ='orders';
    protected $fillable = [
        'user_id',
        'subtotal',
        'total',
        'tax',
        'descount',
        'firstname',
        'lastname',
        'email',
        'phone',
        'city',
        'country',
        'address',
        'status',
        'zipcode',
        'is_shipping_different'
    ];
    
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->hasone(Shipping::class);
    }

    public function transaction()
    {
        return $this->hasone(Transaction::class);
    }
    

}
