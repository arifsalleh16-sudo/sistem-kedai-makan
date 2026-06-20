<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $fillable = [
    'no_resit',
    'total'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}