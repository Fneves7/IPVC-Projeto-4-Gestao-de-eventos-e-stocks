<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportGuide extends Model
{
    public function tgDetail(){
        return $this->hasOne(TransportGuideDetail::class,'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
