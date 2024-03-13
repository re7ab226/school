<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin ',
            'email' => 'admin@admin.com',
            'user_type' => '1',
            'email_verified_at' => now(), // Assuming email is verified
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            // Insert parent 2
            DB::table('users')->insert([
                'name' => 'parent ',
                'email' => 'parent@parent.com',
                'user_type' => '2',
                'email_verified_at' => now(), // Assuming email is verified
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
               // Insert student 3
               DB::table('users')->insert([
                'name' => 'student ',
                'email' => 'student@student.com',
                'user_type' => '3',
                'email_verified_at' => now(), // Assuming email is verified
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
                // Insert teacher 4
                DB::table('users')->insert([
                    'name' => 'teacher ',
                    'email' => 'teacher@teacher.com',
                    'user_type' => '4',
                    'email_verified_at' => now(), // Assuming email is verified
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    }
}
