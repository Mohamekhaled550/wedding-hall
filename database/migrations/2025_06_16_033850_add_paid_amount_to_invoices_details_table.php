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
    Schema::table('invoices_details', function (Blueprint $table) {
        $table->decimal('paid_amount', 10, 2)->default(0)->after('Payment_Date');
    });
}

public function down(): void
{
    Schema::table('invoices_details', function (Blueprint $table) {
        $table->dropColumn('paid_amount');
    });
}

};
