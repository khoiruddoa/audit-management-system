<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('nip');
            $table->string('inisial');
            $table->string('jabatan');
            $table->string('posisi');
            $table->string('alamat');
            $table->string('hp')->nullable();
            $table->foreignId('role_id')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Doa',
                'email' => 'khoiruddoa@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '08123',
                'nip' => '1',
                'inisial' => 'sp',
                'jabatan' => 'Admin',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Bambang Suhartono',
                'email' => 'bambang@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '081231',
                'nip' => '11',
                'inisial' => 'bs',
                'jabatan' => 'CEO',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);

        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Novar',
                'email' => 'novar@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '0812312',
                'nip' => '111',
                'inisial' => 'N',
                'jabatan' => 'Staff',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);

        DB::table('users')->insert([
            [
                'role_id' => 3,
                'name' => 'Inten',
                'email' => 'inten@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '081231123',
                'nip' => '1133',
                'inisial' => 'i',
                'jabatan' => 'staff',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);

        DB::table('users')->insert([
            [
                'role_id' => 3,
                'name' => 'Nanda',
                'email' => 'nanda@gmail.com',
                'password' => Hash::make('password'),
                'hp' => '08123112311',
                'nip' => '11332',
                'inisial' => 'n',
                'jabatan' => 'staff',
                'posisi' => 'internal',
                'alamat' => 'bitung'
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
