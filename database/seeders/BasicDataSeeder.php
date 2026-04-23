<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Database\Seeder;

class BasicDataSeeder extends Seeder
{
    public function run(): void
    {
        $hallOne = Section::firstOrCreate(
            ['name' => 'Hall 1'],
            ['description' => 'Main wedding hall', 'Created_by' => 'system']
        );

        $hallTwo = Section::firstOrCreate(
            ['name' => 'Hall 2'],
            ['description' => 'Second wedding hall', 'Created_by' => 'system']
        );

        $menuCategory = Category::firstOrCreate(['name' => 'Raw Materials']);

        $rice = Ingredient::firstOrCreate(
            ['name' => 'Rice'],
            [
                'unit' => 'kg',
                'unit_price' => 30,
                'category_id' => $menuCategory->id,
                'minimum_stock' => 20,
                'stock_alert_enabled' => true,
            ]
        );

        $chicken = Ingredient::firstOrCreate(
            ['name' => 'Chicken'],
            [
                'unit' => 'kg',
                'unit_price' => 120,
                'category_id' => $menuCategory->id,
                'minimum_stock' => 15,
                'stock_alert_enabled' => true,
            ]
        );

        $salad = Ingredient::firstOrCreate(
            ['name' => 'Salad'],
            [
                'unit' => 'kg',
                'unit_price' => 40,
                'category_id' => $menuCategory->id,
                'minimum_stock' => 10,
                'stock_alert_enabled' => true,
            ]
        );

        $standardMenu = Product::firstOrCreate(
            ['name' => 'Standard Menu'],
            ['description' => 'Default package for testing', 'img' => 'default-menu.jpg']
        );

        $standardMenu->sections()->syncWithoutDetaching([$hallOne->id, $hallTwo->id]);

        $standardMenu->ingredients()->syncWithoutDetaching([
            $rice->id => ['quantity_per_plate' => 0.20],
            $chicken->id => ['quantity_per_plate' => 0.25],
            $salad->id => ['quantity_per_plate' => 0.10],
        ]);
    }
}
