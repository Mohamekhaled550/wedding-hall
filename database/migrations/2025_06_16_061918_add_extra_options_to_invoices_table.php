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
    Schema::table('invoices', function (Blueprint $table) {
        // حجز الغرف
        $table->boolean('rooms_enabled')->default(false);
        $table->integer('rooms_count')->nullable();
        $table->decimal('room_price', 10, 2)->nullable();

        // باكدج التصوير
        $table->boolean('photo_enabled')->default(false);
        $table->decimal('photo_price', 10, 2)->nullable();

        // فقرات غنائية
        $table->boolean('songs_enabled')->default(false);
        $table->integer('songs_count')->nullable();
        $table->decimal('song_price', 10, 2)->nullable();

        // السرفيس
        $table->boolean('service_enabled')->default(false);
        $table->decimal('service_price', 10, 2)->nullable();

        // خيار إضافي
        $table->boolean('extra_option_enabled')->default(false);
        $table->string('extra_option_name')->nullable();
        $table->decimal('extra_option_price', 10, 2)->nullable();
    });
}

public function down()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->dropColumn([
            'rooms_enabled', 'rooms_count', 'room_price',
            'photo_enabled', 'photo_price',
            'songs_enabled', 'songs_count', 'song_price',
            'service_enabled', 'service_price',
            'extra_option_enabled', 'extra_option_name', 'extra_option_price'
        ]);
    });
}

};
