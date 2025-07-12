<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'unit',
        'current_stock',
        'unit_price',
    ];

    public function productIngredients()
    {
        return $this->hasMany(ProductIngredient::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}

}


