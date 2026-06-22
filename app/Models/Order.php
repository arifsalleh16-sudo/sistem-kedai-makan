<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $fillable = [
    'user_id',    
    'no_resit',
    'jumlah_harga'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}