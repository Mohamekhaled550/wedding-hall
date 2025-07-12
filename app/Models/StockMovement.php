<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'stock_id',
        'movement_type',
        'quantity',
        'description',
    ];



    public function ingredient()
{
    return $this->belongsTo(Ingredient::class);
}


}
