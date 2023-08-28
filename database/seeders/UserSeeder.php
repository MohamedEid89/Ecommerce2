<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mohamed Eid',
            'email' => 'admin@admin.com',
            'phone_number' => '39339399393',
            'password' => Hash::make('admin@admin.com'),
            
        ]);
        User::create([
            'name' => 'Mohamed Eid2',
            'email' => 'mhd88998d92@mail.com',
            'phone_number' => '39393399392',
            'password' => Hash::make('123123d123'),
            
        ]);
    }
}
