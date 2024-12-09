<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bulan;
use App\Models\Kelas;
use App\Models\Tahun;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Tingkat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'isAdmin' => true,
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'isAdmin' => false,
        ]);
        Bulan::create([
            'nama' => 'Januari',
        ]);
        Bulan::create([
            'nama' => 'Februari',
        ]);
        Bulan::create([
            'nama' => 'Maret',
        ]);
        Bulan::create([
            'nama' => 'April',
        ]);
        Bulan::create([
            'nama' => 'Mei',
        ]);
        Bulan::create([
            'nama' => 'Juni',
        ]);
        Bulan::create([
            'nama' => 'Juli',
        ]);
        Bulan::create([
            'nama' => 'Agustus',
        ]);
        Bulan::create([
            'nama' => 'September',
        ]);
        Bulan::create([
            'nama' => 'Oktober',
        ]);
        Bulan::create([
            'nama' => 'November',
        ]);
        Bulan::create([
            'nama' => 'Desember',
        ]);
        Tahun::create([
            'nama' => '2021',
        ]);
        Tahun::create([
            'nama' => '2022',
        ]);
        Tahun::create([
            'nama' => '2023',
        ]);
        Tahun::create([
            'nama' => '2024',
        ]);
        Tahun::create([
            'nama' => '2025',
        ]);
        Jenjang::create([
            'nama' => 'PAUD',
        ]);
        Jenjang::create([
            'nama' => 'TK',
        ]);
        Jenjang::create([
            'nama' => 'SD',
        ]);
        Jenjang::create([
            'nama' => 'SMP',
        ]);
        Jenjang::create([
            'nama' => 'SMA',
        ]);
        Jurusan::create([
            'nama' => 'Non Jurusan',
        ]);
        Jurusan::create([
            'nama' => 'IPA',
        ]);
        Jurusan::create([
            'nama' => 'IPS',
        ]);
        // Tingkat::create([
        //     'nama' => 'PAUD',
        // ]);
        // Tingkat::create([
        //     'nama' => 'TK',
        // ]);
        // Tingkat::create([
        //     'nama' => '1',
        // ]);
        // Tingkat::create([
        //     'nama' => '2',
        // ]);
        // Tingkat::create([
        //     'nama' => '3',
        // ]);
        // Tingkat::create([
        //     'nama' => '4',
        // ]);
        // Tingkat::create([
        //     'nama' => '5',
        // ]);
        // Tingkat::create([
        //     'nama' => '6',
        // ]);
        // Tingkat::create([
        //     'nama' => '7',
        // ]);
        // Tingkat::create([
        //     'nama' => '8',
        // ]);
        // Tingkat::create([
        //     'nama' => '9',
        // ]);
        // Tingkat::create([
        //     'nama' => '10',
        // ]);
        // Tingkat::create([
        //     'nama' => '11',
        // ]);
        // Tingkat::create([
        //     'nama' => '12',
        // ]);
    }
}
