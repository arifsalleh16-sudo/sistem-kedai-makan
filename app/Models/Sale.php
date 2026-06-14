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

    public function store(Request $request)
{
    Sale::create([
        'menu_id' => $request->menu_id,
        'kuantiti' => $request->kuantiti
    ]);

    return redirect('/sales/create');
}
}