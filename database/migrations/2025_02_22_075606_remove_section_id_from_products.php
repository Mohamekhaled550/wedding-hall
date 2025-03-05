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
        Schema::table('products', function (Blueprint $table) {
            // حذف المفتاح الأجنبي أولًا
            $table->dropForeign(['section_id']);

            // حذف العمود بعد المفتاح الأجنبي
            $table->dropColumn('section_id');
        });
    }
    /**
     * Reverse the migrations.
     */


     public function down()
     {
         Schema::table('products', function (Blueprint $table) {
             // إعادة العمود مع المفتاح الأجنبي لو تم التراجع عن التغيير
             $table->unsignedBigInteger('section_id')->nullable();
             $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
         });
     }
};
