<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'harga',
        'is_active',
        'category_id'
    ];

    public function category()
{
    return $this->belongsTo(Category::class);
}

    public function sales()
{
    return $this->hasMany(Sale::class);
}

    public function user()
{
    return $this->belongsTo(User::class);
}

}