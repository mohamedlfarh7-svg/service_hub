<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    'provider_id', 
    'category_id', 
    'title', 
    'description', 
    'price_in_points', 
    'price', 
    'status', 
    'image',
    'provider_id',
];
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    public function provider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
