<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    
    public function run(): void
    {
        Setting::updateOrCreate(['type' => 'setting'], [
            'facebook'    => 'https://facebook.com' ,
            'youtube'    => 'https://youtube.com' ,
            'twitter'    => 'https://x.com' ,
            'phone'    => '201000000000' ,
            'whatsapp'    => '201000000000' ,
            'location'    => 'Cairo' ,
            'email'    => 'info@hall.local' ,
            'gmail'    => 'info@hall.local' ,
            'type'    => 'setting' ,
        ]);
    }
}
