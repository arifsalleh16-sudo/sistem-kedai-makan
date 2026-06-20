<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use Illuminate\Http\Request;

class OrderItem extends Model
{
    protected $fillable = [
    'order_id',
    'menu_id',
    'kuantiti',
    'harga',
    'subtotal'
    ];

    public function menu()
    {
    return $this->belongsTo(Menu::class);
    }


}