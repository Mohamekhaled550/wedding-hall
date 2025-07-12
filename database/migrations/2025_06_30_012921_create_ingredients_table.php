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
       Schema::create('ingredients', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('unit')->default('kg'); // kg, g, piece, L...
    $table->decimal('unit_price', 10, 2)->nullable(); // سعر الوحدة
    $table->timestamps();
});

    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
};
