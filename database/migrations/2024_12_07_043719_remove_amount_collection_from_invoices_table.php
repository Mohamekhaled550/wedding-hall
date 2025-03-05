<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAmountCollectionFromInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // حذف العمود Amount_collection
            if (Schema::hasColumn('invoices', 'Amount_collection')) {
                $table->dropColumn('Amount_collection');
            }
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // إضافة العمود مرة أخرى إذا لزم الأمر
            $table->decimal('Amount_collection', 8, 2)->nullable();
        });
    }
}
