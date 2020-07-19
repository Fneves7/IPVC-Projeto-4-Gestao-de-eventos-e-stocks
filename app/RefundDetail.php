<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefundDetail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price', 'discount', 'amount',
    ];

    public function products(){
        return $this->hasMany(Product::class,'id', 'product_id');
    }
}
