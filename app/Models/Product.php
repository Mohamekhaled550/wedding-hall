<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
        protected $fillable = ['name', 'description', 'price'];


    public function sections()
    {
        return $this->belongsToMany(Section::class, 'product_section', 'product_id', 'section_id');
    }

  public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredients')
            ->withPivot('quantity_per_plate')
            ->withTimestamps();
    }




}
