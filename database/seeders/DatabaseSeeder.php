<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'azmi',
            'role' => 'admin',
            'email' => 'azmi',
            'password' => Hash::make('azmi'),
        ]);

        \App\Models\User::create([
            'name' => 'sammi',
            'role' => 'guru',
            'email' => 'sammi',
            'password' => Hash::make('sammi'),
        ]);

        \App\Models\User::create([
            'name' => 'badu',
            'role' => 'siswa',
            'email' => 'badu',
            'password' => Hash::make('badu'),
        ]);
    }
}
