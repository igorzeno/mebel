<?php

namespace App\Models;

use App\Models\Scopes\DraftScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
