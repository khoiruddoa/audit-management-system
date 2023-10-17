<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            [

                'name' => 'Doa',
                'email' => 'khoiruddoa@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '08123',
                'nip' => '1',
               
                'jabatan' => 'Admin',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
        $user->assignRole('super admin');

        $user = User::create([
            [

                'name' => 'Bambang Suhartono',
                'email' => 'bambang@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '081231',
                'nip' => '11',
               
                'jabatan' => 'CEO',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
        $user->assignRole('user');

        $user = User::create([
            [
                'role_id' => 1,
                'name' => 'Novar',
                'email' => 'novar@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '0812312',
                'nip' => '111',
                
                'jabatan' => 'Staff',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
        $user->assignRole('user');

        $user = User::create([
            [
                'role_id' => 3,
                'name' => 'Inten',
                'email' => 'inten@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '081231123',
                'nip' => '1133',
                
                'jabatan' => 'staff',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
        $user->assignRole('user');

        $user = User::create([
            [
                'role_id' => 3,
                'name' => 'Nanda',
                'email' => 'nanda@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '08123112311',
                'nip' => '11332',
               
                'jabatan' => 'staff',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
    }
}