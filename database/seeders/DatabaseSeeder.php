<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@koperasi.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Buat Akun Nasabah (Member)
        User::create([
            'name' => 'Nasabah Reguler',
            'email' => 'member@koperasi.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'balance_pokok' => 500000,
            'balance_wajib' => 0,
            'balance_sukarela' => 100000,
        ]);

        // 3. Buat Aturan Pinjaman Tier 1 (Plafon < 10 Juta)
        \App\Models\LoanRule::create([
            'min_plafon' => 1000000,
            'max_plafon' => 9999999, // Di bawah 10 juta
            'tenor_months' => 12,
            'interest_rate_monthly' => 1.0, // 1% flat
            'admin_fee_percent' => 2.0, // 2%
            'insurance_fee_percent' => 1.0, // 1%
            'mandatory_savings_flat' => 300000, // Rp 300.000
        ]);

        // 4. Buat Aturan Pinjaman Tier 2 (Plafon 10 - 25 Juta)
        \App\Models\LoanRule::create([
            'min_plafon' => 10000000, // 10 Juta ke atas
            'max_plafon' => 25000000, // Maks 25 Juta
            'tenor_months' => 24,
            'interest_rate_monthly' => 0.5, // 0.5% flat
            'admin_fee_percent' => 2.0, // 2%
            'insurance_fee_percent' => 1.0, // 1%
            'mandatory_savings_flat' => 300000, // Rp 300.000
        ]);
    }
}
