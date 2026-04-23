<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('invoice_Date');
            $table->date('due_date')->nullable();

            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();

            $table->integer('number_of_people')->nullable();
            $table->decimal('plate_price', 10, 2)->nullable();

            $table->string('discount')->nullable();
            $table->decimal('Total', 10, 2)->default(0);
            $table->string('customer_email')->nullable();

            $table->string('Status', 50);
            $table->integer('value_status');
            $table->date('Payment_Date')->nullable();
            $table->string('user')->nullable();
            $table->text('note')->nullable();

            $table->boolean('rooms_enabled')->default(false);
            $table->integer('rooms_count')->nullable();
            $table->decimal('room_price', 10, 2)->nullable();

            $table->boolean('photo_enabled')->default(false);
            $table->decimal('photo_price', 10, 2)->nullable();

            $table->boolean('songs_enabled')->default(false);
            $table->integer('songs_count')->nullable();
            $table->decimal('song_price', 10, 2)->nullable();

            $table->boolean('service_enabled')->default(false);
            $table->decimal('service_price', 10, 2)->nullable();

            $table->boolean('extra_option_enabled')->default(false);
            $table->string('extra_option_name')->nullable();
            $table->decimal('extra_option_price', 10, 2)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
