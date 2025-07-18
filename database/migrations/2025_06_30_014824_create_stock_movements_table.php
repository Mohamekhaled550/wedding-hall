<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('stock_movements', function (Blueprint $table) {
    $table->id();
    $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
    $table->enum('type', ['in', 'out']); // in = إضافة، out = خصم
    $table->decimal('quantity', 10, 2);  // الكمية اللي تحركت
    $table->string('source')->nullable(); // مصدر الحركة (فاتورة/مورد/تصحيح)
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
