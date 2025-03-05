<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_section', 'section_id', 'product_id');
    }


}
