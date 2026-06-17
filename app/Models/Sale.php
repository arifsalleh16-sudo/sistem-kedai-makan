<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use Illuminate\Http\Request;

class Sale extends Model
{
    protected $fillable = [
        'menu_id',
        'kuantiti'
    ];

    public function menu()
    {

        return $this->belongsTo(Menu::class);

    }


}