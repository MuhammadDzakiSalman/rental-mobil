<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Pelanggan 1',
            'alamat' => 'Jalan Sudirman No. 123',
            'nomor_ktp' => '1234567890',
            'nomor_telepon' => '123',
            'gender' => 'pria',
            'password' => Hash::make('123'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'alamat' => 'Jalan Admin No. 456',
            'nomor_ktp' => '0987654321',
            'nomor_telepon' => '1234',
            'gender' => 'wanita',
            'password' => Hash::make('1234'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Owner',
            'alamat' => 'Jalan Owner No. 789',
            'nomor_ktp' => '1357924680',
            'nomor_telepon' => '12345',
            'gender' => 'pria',
            'password' => Hash::make('12345'),
            'role' => 'owner',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
