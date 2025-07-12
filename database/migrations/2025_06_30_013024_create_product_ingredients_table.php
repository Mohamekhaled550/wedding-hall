<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
       Schema::create('product_ingredients', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->onDelete('cascade');
    $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
    $table->decimal('quantity_per_plate', 10, 2); // الكمية المطلوبة لكل طبق للفرد
    $table->timestamps();
});

    }

    public function down()
    {
        Schema::dropIfExists('product_ingredients');
    }
};
