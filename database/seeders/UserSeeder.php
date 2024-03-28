<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {

        $fake = Factory::create();
        
       $admin = User::create([
            'name'               => 'admin' ,
            'email'              => 'admin@yahoo.com' ,
            'email_verified_at'  => now() ,
            'password'           => bcrypt('password') ,
            'type'               => 'admin' ,
        ]);

        $admin->syncRoles(['admin' => 1]);
       


        for ($i=2; $i < 20 ; $i++) { 
            User::create([
                'name'               => $fake->name() ,
                'email'              => $fake->email() ,
                'email_verified_at'  => now() ,
                'password'           => bcrypt('password') ,
                'type'               => 'user' ,
            ]);
        }
    }
}
