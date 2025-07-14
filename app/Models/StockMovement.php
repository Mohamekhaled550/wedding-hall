<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
      protected $fillable = [
        'ingredient_id',
        'type',
        'quantity',
        'source',
        'invoice_id',
    ];



    public function ingredient()
{
    return $this->belongsTo(Ingredient::class);
}

public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }


}
