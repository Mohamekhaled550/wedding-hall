<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'ingredient_id',
        'quantity',
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }

    
}
