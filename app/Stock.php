<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['user_id', 'product_id', 'stock'];

    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
