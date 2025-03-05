<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvoicesTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // حذف الأعمدة غير المرغوب فيها
            $table->dropColumn('Amount_Commission');
            $table->dropColumn('rate_vat');

            // إضافة الأعمدة الجديدة
            $table->integer('number_of_people')->nullable()->comment('عدد الأشخاص')->after('product_id');
            $table->decimal('plate_price', 8, 2)->nullable()->comment('سعر الطبق')->after('number_of_people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // إعادة الأعمدة المحذوفة
            $table->decimal('Amount_Commission', 8, 2)->nullable()->after('product_id');
            $table->string('rate_vat')->nullable()->after('Amount_Commission');

            // حذف الأعمدة المضافة
            $table->dropColumn('number_of_people');
            $table->dropColumn('plate_price');
        });
    }
}
