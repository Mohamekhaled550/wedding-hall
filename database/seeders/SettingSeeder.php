<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    
    public function run(): void
    {
        Setting::create([
            'facebook'    => 'facebook' ,
            'youtube'    => 'youtube' ,
            'twitter'    => 'twitter' ,
            'phone'    => 'phone' ,
            'whatsapp'    => 'whatsapp' ,
            'location'    => 'location' ,
            'email'    => 'email@yahoo.com' ,
            'gmail'    => 'gmail@yahoo.com' ,
            'type'    => 'setting' ,
        ]);
    }
}
