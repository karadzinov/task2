<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price'
    ];

    // Relationship with CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relationship with Order through CartItem
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'cart_items')->withPivot('quantity', 'price');
    }
}
