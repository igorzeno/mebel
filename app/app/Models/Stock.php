<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

//    public function scopeAvailableInStock($query)
//    {
//        return $query->where('stock', '>', 0);
//    }
}
