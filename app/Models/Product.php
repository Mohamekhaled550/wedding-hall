<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'product_section', 'product_id', 'section_id');
    }

    public function productIngredients()
{
    return $this->hasMany(ProductIngredient::class);
}



}
