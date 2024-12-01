<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Negara;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Tingkat;
use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\SekolahAsal;
use App\Models\TahunPelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User Seeder
        // User Administrator
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@salambupandeglang.sch.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'administrator',
            'foto' => '',
            'isActive' => true,
        ]);

        // // User Supervisor
        // User::create([
        //     'name' => 'Kepala Yayasan',
        //     'email' => 'supervisor@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'supervisor',
        //     'foto' => '',
        // ]);

        // // User Bendahara
        // User::create([
        //     'name' => 'Bendahara Yayasan',
        //     'email' => 'bendahara@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'bendahara',
        //     'foto' => '',
        // ]);

        // // User Operator
        // User::create([
        //     'name' => 'Operator Yayasan',
        //     'email' => 'operator@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'operator',
        //     'foto' => '',
        // ]);

        // // User Kepala PAUD
        // User::create([
        //     'name' => 'Kepala PAUD',
        //     'email' => 'paud@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'kepala_paud',
        //     'jenjang_id' => 1,
        //     'foto' => '',
        // ]);

        // // User Kepala TK
        // User::create([
        //     'name' => 'Kepala TK',
        //     'email' => 'tk@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'kepala_tk',
        //     'jenjang_id' => 2,
        //     'foto' => '',
        // ]);

        // // User Kepala SD
        // User::create([
        //     'name' => 'Kepala SD',
        //     'email' => 'sd@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'kepala_sd',
        //     'jenjang_id' => 3,
        //     'foto' => '',
        // ]);

        // // User Kepala SMP
        // User::create([
        //     'name' => 'Kepala SMP',
        //     'email' => 'smp@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'kepala_smp',
        //     'jenjang_id' => 4,
        //     'foto' => '',
        // ]);

        // // User Kepala SMA
        // User::create([
        //     'name' => 'Kepala SMA',
        //     'email' => 'sma@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'kepala_sma',
        //     'jenjang_id' => 5,
        //     'foto' => '',
        // ]);

        // // User Wali Kelas Paud
        // User::create([
        //     'name' => 'Wali Kelas PAUD',
        //     'email' => 'wali_kelas_paud@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'wali_kelas_paud',
        //     'jenjang_id' => 1,
        //     'kelas_id' => 1,
        //     'foto' => '',
        // ]);

        // // User Wali Kelas TK A
        // User::create([
        //     'name' => 'Wali Kelas TK A',
        //     'email' => 'wali_kelas_tka@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'wali_kelas_tk',
        //     'jenjang_id' => 2,
        //     'kelas_id' => 2,
        //     'foto' => '',
        // ]);

        // // User Wali Kelas TK B
        // User::create([
        //     'name' => 'Wali Kelas TK B',
        //     'email' => 'wali_kelas_tkb@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'wali_kelas_tk',
        //     'jenjang_id' => 2,
        //     'kelas_id' => 3,
        //     'foto' => '',
        // ]);

        // // User Wali Kelas SD Kelas 1 A
        // User::create([
        //     'name' => 'Wali Kelas SD Kelas 1 A',
        //     'email' => 'wali_kelas_sd_1a@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'wali_kelas_sd',
        //     'jenjang_id' => 3,
        //     'kelas_id' => 4,
        //     'foto' => '',
        // ]);

        // // User Wali Kelas SD Kelas 1 B
        // User::create([
        //     'name' => 'Wali Kelas SD Kelas 1 B',
        //     'email' => 'wali_kelas_sd_1b@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'wali_kelas_sd',
        //     'jenjang_id' => 3,
        //     'kelas_id' => 5,
        //     'foto' => '',
        // ]);

        // // User Wali Kelas SD Kelas 1 C
        // User::create([
        //     'name' => 'Wali Kelas SD Kelas 1 C',
        //     'email' => 'wali_kelas_sd_1c@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'wali_kelas_sd',
        //     'jenjang_id' => 3,
        //     'kelas_id' => 6,
        //     'foto' => '',
        // ]);

        // // User Siswa PAUD
        // User::create([
        //     'name' => 'Siswa PAUD',
        //     'email' => 'siswa_paud@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'siswa_paud',
        //     'jenjang_id' => 1,
        //     'kelas_id' => 1,
        //     'siswa_id' => 1,
        //     'foto' => '',
        // ]);

        // // User Siswa TK
        // User::create([
        //     'name' => 'Siswa TK',
        //     'email' => 'siswa_tk@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'siswa_tk',
        //     'siswa_id' => 2,
        //     'foto' => '',
        // ]);

        // // User Siswa SD
        // User::create([
        //     'name' => 'Siswa SD',
        //     'email' => 'siswa_sd@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'siswa_sd',
        //     'siswa_id' => 3,
        //     'foto' => '',
        // ]);

        // // User Siswa SMP
        // User::create([
        //     'name' => 'Siswa SMP',
        //     'email' => 'siswa_smp@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'siswa_smp',
        //     'siswa_id' => 4,
        //     'foto' => '',
        // ]);

        // // User Siswa SMA
        // User::create([
        //     'name' => 'Siswa SMA',
        //     'email' => 'siswa_sma@salambupandeglang.sch.id',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'role' => 'siswa_sma',
        //     'siswa_id' => 5,
        //     'foto' => '',
        // ]);











        // Jenjang Seeder
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

        // Tingkat Seeder
        // Tingkat PAUD
        Tingkat::create([
            'nama' => 'PAUD',
            'jenjang_id' => 1,
        ]);
        Tingkat::create([
            'nama' => 'TK',
            'jenjang_id' => 2,
        ]);
        Tingkat::create([
            'nama' => '1',
            'jenjang_id' => 3,
        ]);
        Tingkat::create([
            'nama' => '2',
            'jenjang_id' => 3,
        ]);
        Tingkat::create([
            'nama' => '3',
            'jenjang_id' => 3,
        ]);
        Tingkat::create([
            'nama' => '4',
            'jenjang_id' => 3,
        ]);
        Tingkat::create([
            'nama' => '5',
            'jenjang_id' => 3,
        ]);
        Tingkat::create([
            'nama' => '6',
            'jenjang_id' => 3,
        ]);
        Tingkat::create([
            'nama' => '7',
            'jenjang_id' => 4,
        ]);
        Tingkat::create([
            'nama' => '8',
            'jenjang_id' => 4,
        ]);
        Tingkat::create([
            'nama' => '9',
            'jenjang_id' => 4,
        ]);
        Tingkat::create([
            'nama' => '10',
            'jenjang_id' => 5,
        ]);
        Tingkat::create([
            'nama' => '11',
            'jenjang_id' => 5,
        ]);
        Tingkat::create([
            'nama' => '12',
            'jenjang_id' => 5,
        ]);

        // Jurusan Seeder
        Jurusan::create([
            'nama' => 'Non Jurusan',
        ]);
        Jurusan::create([
            'nama' => 'IPA',
        ]);
        Jurusan::create([
            'nama' => 'IPS',
        ]);

        // Kelas Seeder
        Kelas::create([
            'nama' => 'PAUD',
            'jurusan_id' => 1,
            'tingkat_id' => 1,
        ]);
        Kelas::create([
            'nama' => 'TK A',
            'jurusan_id' => 1,
            'tingkat_id' => 2,
        ]);
        Kelas::create([
            'nama' => 'TK B',
            'jurusan_id' => 1,
            'tingkat_id' => 2,
        ]);
        Kelas::create([
            'nama' => '1 A',
            'jurusan_id' => 1,
            'tingkat_id' => 3,
        ]);
        Kelas::create([
            'nama' => '1 B',
            'jurusan_id' => 1,
            'tingkat_id' => 3,
        ]);
        Kelas::create([
            'nama' => '1 C',
            'jurusan_id' => 1,
            'tingkat_id' => 3,
        ]);
        Kelas::create([
            'nama' => '2 A',
            'jurusan_id' => 1,
            'tingkat_id' => 4,
        ]);
        Kelas::create([
            'nama' => '2 B',
            'jurusan_id' => 1,
            'tingkat_id' => 4,
        ]);
        Kelas::create([
            'nama' => '2 C',
            'jurusan_id' => 1,
            'tingkat_id' => 4,
        ]);
        Kelas::create([
            'nama' => '3 A',
            'jurusan_id' => 1,
            'tingkat_id' => 5,
        ]);
        Kelas::create([
            'nama' => '3 B',
            'jurusan_id' => 1,
            'tingkat_id' => 5,
        ]);
        Kelas::create([
            'nama' => '3 C',
            'jurusan_id' => 1,
            'tingkat_id' => 5,
        ]);
        Kelas::create([
            'nama' => '4 A',
            'jurusan_id' => 1,
            'tingkat_id' => 6,
        ]);
        Kelas::create([
            'nama' => '4 B',
            'jurusan_id' => 1,
            'tingkat_id' => 6,
        ]);
        Kelas::create([
            'nama' => '4 C',
            'jurusan_id' => 1,
            'tingkat_id' => 6,
        ]);
        Kelas::create([
            'nama' => '5 A',
            'jurusan_id' => 1,
            'tingkat_id' => 7,
        ]);
        Kelas::create([
            'nama' => '5 B',
            'jurusan_id' => 1,
            'tingkat_id' => 7,
        ]);
        Kelas::create([
            'nama' => '5 C',
            'jurusan_id' => 1,
            'tingkat_id' => 7,
        ]);
        Kelas::create([
            'nama' => '6 A',
            'jurusan_id' => 1,
            'tingkat_id' => 8,
        ]);
        Kelas::create([
            'nama' => '6 B',
            'jurusan_id' => 1,
            'tingkat_id' => 8,
        ]);
        Kelas::create([
            'nama' => '6 C',
            'jurusan_id' => 1,
            'tingkat_id' => 8,
        ]);
        Kelas::create([
            'nama' => '7 A',
            'jurusan_id' => 1,
            'tingkat_id' => 9,
        ]);
        Kelas::create([
            'nama' => '7 B',
            'jurusan_id' => 1,
            'tingkat_id' => 9,
        ]);
        Kelas::create([
            'nama' => '7 C',
            'jurusan_id' => 1,
            'tingkat_id' => 9,
        ]);
        Kelas::create([
            'nama' => '8 A',
            'jurusan_id' => 1,
            'tingkat_id' => 10,
        ]);
        Kelas::create([
            'nama' => '8 B',
            'jurusan_id' => 1,
            'tingkat_id' => 10,
        ]);
        Kelas::create([
            'nama' => '8 C',
            'jurusan_id' => 1,
            'tingkat_id' => 10,
        ]);
        Kelas::create([
            'nama' => '9 A',
            'jurusan_id' => 1,
            'tingkat_id' => 11,
        ]);
        Kelas::create([
            'nama' => '9 B',
            'jurusan_id' => 1,
            'tingkat_id' => 11,
        ]);
        Kelas::create([
            'nama' => '9 C',
            'jurusan_id' => 1,
            'tingkat_id' => 11,
        ]);
        Kelas::create([
            'nama' => '10 IPA',
            'jurusan_id' => 2,
            'tingkat_id' => 12,
        ]);
        Kelas::create([
            'nama' => '10 IPS',
            'jurusan_id' => 3,
            'tingkat_id' => 12,
        ]);
        Kelas::create([
            'nama' => '11 IPA',
            'jurusan_id' => 2,
            'tingkat_id' => 13,
        ]);
        Kelas::create([
            'nama' => '11 IPS',
            'jurusan_id' => 3,
            'tingkat_id' => 13,
        ]);
        Kelas::create([
            'nama' => '12 IPA',
            'jurusan_id' => 2,
            'tingkat_id' => 14,
        ]);
        Kelas::create([
            'nama' => '12 IPS',
            'jurusan_id' => 3,
            'tingkat_id' => 14,
        ]);

        // Negara Seeder
        Negara::create([
            'nama' => 'Indonesia',
        ]);

        // Provinsi Seeder
        Provinsi::create([
            'nama' => 'Banten',
            'negara_id' => 1,
        ]);

        // Kabupaten Seeder
        Kabupaten::create([
            'nama' => 'Pandeglang',
            'provinsi_id' => 1,
        ]);

        // Kecamatan Seeder
        Kecamatan::create([
            'nama' => 'Pandeglang',
            'kabupaten_id' => 1,
        ]);
        Kecamatan::create([
            'nama' => 'Kaduhejo',
            'kabupaten_id' => 1,
        ]);
        // Kelurahan Seeder
        Kelurahan::create([
            'nama' => 'Pandeglang',
            'kecamatan_id' => 1,
        ]);
        Kelurahan::create([
            'nama' => 'Palurahan',
            'kecamatan_id' => 2,
        ]);

        // Sekolah Asal Seeder
        SekolahAsal::create([
            'nama' => 'MTs Negeri 1 Pandeglang',
            'npsn' => '20600458',
            'alamat' => 'Jl. Raya Labuan Km. 5,7',
            'negara_id' => 1,
            'provinsi_id' => 1,
            'kabupaten_id' => 1,
            'kecamatan_id' => 2,
            'kelurahan_id' => 2,
            'website' => 'https://mtsn1pandeglang.sch.id',
            'email' => 'adm@mtsn1pandeglang.sch.id',
            'telepon' => '+6289612050291',
            'status_sekolah' => 'Negeri',
            'Akreditasi' => 'A',
        ]);
        SekolahAsal::create([
            'nama' => 'Contoh Sekolah Ke 2',
            'npsn' => '12345678',
            'alamat' => 'Alamat Sekolah Ke 2',
            'negara_id' => 1,
            'provinsi_id' => 1,
            'kabupaten_id' => 1,
            'kecamatan_id' => 1,
            'kelurahan_id' => 1,
            'website' => 'https://sekolahkedua.sch.id',
            'email' => 'adm@sekolahkedua.sch.id',
            'telepon' => '+6281234567890',
            'status_sekolah' => 'Swasta',
            'Akreditasi' => 'B',
        ]);

        // Instasi Seeder
        Instansi::create([
            'nama' => 'Sekolah Alam Bahriatul Ulum Pandeglang',
            'logo' => 'logo.png',
            'stempel' => 'stempel.png',
            'npsn' => '206001234',
            'telepon' => '+6289612050291',
            'email' => 'admin@salambupandeglang.sch.id',
            'website' => 'https://salambupandeglang.sch.id',
            'status_instansi' => 'Swasta',
            'nama_kepala_yayasan' => 'Nama Kepala Yayasan',
            'nama_kepala_paud' => 'Nama Kepala Paud',
            'nip_kepala_paud' => '',
            'tte_kepala_paud' => '',
            'akreditasi_paud' => 'A',
            'kop_surat_paud' => 'kop_surat_paud.png',
            'nama_kepala_tk' => 'Nama Kepala TK',
            'nip_kepala_tk' => '',
            'tte_kepala_tk' => '',
            'akreditasi_tk' => 'A',
            'kop_surat_tk' => 'kop_surat_tk.png',
            'nama_kepala_sd' => 'Nama Kepala SD',
            'nip_kepala_sd' => '',
            'tte_kepala_sd' => '',
            'akreditasi_sd' => 'A',
            'kop_surat_sd' => 'kop_surat_sd.png',
            'nama_kepala_smp' => 'Nama Kepala SMP',
            'nip_kepala_smp' => '',
            'tte_kepala_smp' => '',
            'akreditasi_smp' => 'A',
            'kop_surat_smp' => 'kop_surat_smp.png',
            'nama_kepala_sma' => 'Nama Kepala SMA',
            'nip_kepala_sma' => '',
            'tte_kepala_sma' => '',
            'akreditasi_sma' => 'A',
            'kop_surat_sma' => 'kop_surat_sma.png',
            'nama_bank' => 'Bank Yayasan Salambu',
            'nama_rekening' => 'Rekening Yayasan Salambu',
            'nomor_rekening' => '1234567890',
            'alamat' => 'Komplek Cahaya Mandiri, Sukaratu, Kecamatan Majasari, Kabupaten Pandeglang, Provinsi Banten',
            'negara_id' => 1,
            'provinsi_id' => 1,
            'kabupaten_id' => 1,
            'kecamatan_id' => 1,
            'kelurahan_id' => 1,
        ]);

        // Tahun Pelajaran Seeder
        TahunPelajaran::create([
            'nama' => '2024/2025',
            'isActive' => true,
        ]);
        TahunPelajaran::create([
            'nama' => '2025/2026',
            'isActive' => false,
        ]);
        TahunPelajaran::create([
            'nama' => '2026/2027',
            'isActive' => false,
        ]);
        TahunPelajaran::create([
            'nama' => '2028/2029',
            'isActive' => false,
        ]);
        TahunPelajaran::create([
            'nama' => '2029/2030',
            'isActive' => false,
        ]);

        // Siswa Seeder
        Siswa::create([
            'foto' => '',
            'nama' => 'Nama Siswa',
            'nik' => '3601211801000001',
            'nisn' => '0000971291',
            'nis' => '202118012000',
            'Agama' => '',
            'jenis_kelamin' => '',
            'golongan_darah' => '',
            'tempat_lahir' => 1,
            'tanggal_lahir' => '',
            'sekolah_asal_id' => 1,
            'tanggal_diterima' => '',
            'jenjang_id' => 1,
            'tingkat_id' => 1,
            'jurusan_id' => 1,
            'kelas_awal' => 1,
            'kelas_id' => 1,
            'alamat' => 'Kp. Kebon Cau RT 001 RW 005',
            'negara_id' => 1,
            'provinsi_id' => 1,
            'kabupaten_id' => 1,
            'kecamatan_id' => 1,
            'kelurahan_id' => 1,
            'nama_ayah_kandung' => 'Nama Ayah Kandung',
            'telepon_ayah_kandung' => '',
            'nama_ibu_kandung' => 'Nama Ibu Kandung',
            'telepon_ibu_kandung' => '',
            'nama_wali' => 'Nama Wali',
            'telepon_wali' => '',
            'jumlah_saudara_kandung' => '',
            'anak_ke' => 1,
            'tinggi_badan' => 160,
            'berat_badan' => 55,
            'penderita_penyakit' => '',
            'penyandang_disabilitas' => '',
            'nama_bank' => '',
            'nama_rekening' => '',
            'nomor_rekening' => '',
            'status_siswa' => 'Aktif',
            'riwayat_kelas' => 1,
        ]);
    }
}
