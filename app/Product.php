<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'barcode', 'price', 'stock'
    ];

    public function orderDetails(){
        return $this->belongsToMany(OrderDetail::class,
            'order_details', 'order_id', 'product_id');
    }

    public function refundDetails(){
        return $this->belongsToMany(RefundDetail::class);
    }

    public function tgDetails(){
        return $this->belongsToMany(TransportGuideDetail::class);
    }

    public function stocks(){
        return $this->belongsToMany(Stock::class, 'stocks', 'product_id', 'id');
    }
}
