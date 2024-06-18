<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KasiPengujianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'H. Herry Daruna, ST.',
            'email' => 'kasi.pengujian@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordS'),
            'role' => 'penguji',
            'remember_token' => Str::random(10),
        ]);
    }
}
