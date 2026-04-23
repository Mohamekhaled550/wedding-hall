<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices_details', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 50);
            $table->foreignId('invoice_id')->constrained('invoices')->cascadeOnDelete();
            $table->string('product', 50);
            $table->string('Section', 999);
            $table->string('Status', 50);
            $table->integer('Value_Status');
            $table->date('Payment_Date')->nullable();
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->text('note')->nullable();
            $table->string('user', 300);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices_details');
    }
};
