<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
       protected $fillable = ['name', 'unit', 'unit_price', 'category_id', 'minimum_stock', 'stock_alert_enabled'];


     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_ingredients')
            ->withPivot('quantity_per_plate')
            ->withTimestamps();
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    // لو حابب تحسب الرصيد ديناميكياً:
    public function getCurrentStockAttribute()
    {
        $in = $this->stockMovements()->where('type', 'in')->sum('quantity');
        $out = $this->stockMovements()->where('type', 'out')->sum('quantity');
        return $in - $out;
    }

    // التحقق من حالة المخزون
    public function getStockStatusAttribute()
    {
        $current = $this->current_stock;
        $minimum = $this->minimum_stock ?? 0;

        if ($current <= 0) {
            return 'نفذ';
        } elseif ($current <= $minimum) {
            return 'منخفض';
        } else {
            return 'متوفر';
        }
    }

    // التحقق إذا كان المخزون منخفض
    public function isLowStock()
    {
        return $this->stock_alert_enabled && $this->current_stock <= ($this->minimum_stock ?? 0);
    }

    // الحصول على النسبة المئوية للمخزون
    public function getStockPercentageAttribute()
    {
        $minimum = $this->minimum_stock ?? 0;
        if ($minimum == 0) return 100;
        return min(100, ($this->current_stock / $minimum) * 100);
    }

}


