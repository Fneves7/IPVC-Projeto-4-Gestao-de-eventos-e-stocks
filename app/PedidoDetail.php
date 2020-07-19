<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity'
    ];

    public function products(){
        return $this->hasMany(Product::class,'id', 'product_id');
    }
}
