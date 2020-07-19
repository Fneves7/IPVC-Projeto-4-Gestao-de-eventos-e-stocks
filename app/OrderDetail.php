<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price', 'discount', 'amount',
    ];

    public function orders(){
        return $this->belongsTo(Order::class,'id');
    }

    public function products(){
        return $this->hasMany(Product::class,'id', 'product_id');
    }
}
