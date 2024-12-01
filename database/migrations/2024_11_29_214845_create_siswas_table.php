<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->unsignedInteger('nik')->unique();
            $table->string('nisn')->nullable()->unique();
            $table->unsignedInteger('nis')->nullable()->unique();
            $table->string('agama')->enum('Islam', 'Kristen Katholik', 'Kristen Protestan', 'Hindu', 'Buddha', 'Konghucu')->default('Islam');
            $table->string('jenis_kelamin')->enum('Laki-laki', 'Perempuan');
            $table->string('golongan_darah')->enum('A+', 'B+', 'AB+', 'O', 'A-', 'B-', 'AB-', 'O');
            $table->foreignId('tempat_lahir')->constrained('kabupatens')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal_lahir')->nullable();
            $table->foreignId('sekolah_asal_id')->constrained('sekolah_asals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal_diterima')->nullable();
            $table->foreignId('jenjang_id')->constrained('jenjangs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('tingkat_id')->constrained('tingkats')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kelas_awal')->constrained('kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('alamat');
            $table->foreignId('negara_id')->constrained('negaras')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('provinsi_id')->constrained('provinsis')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_ayah_kandung');
            $table->string('telepon_ayah_kandung')->nullable();
            $table->string('nama_ibu_kandung');
            $table->string('telepon_ibu_kandung')->nullable();
            $table->string('nama_wali');
            $table->string('telepon_wali')->nullable();
            $table->unsignedInteger('jumlah_saudara_kandung')->default(0);
            $table->unsignedInteger('anak_ke');
            $table->unsignedInteger('tinggi_badan');
            $table->unsignedInteger('berat_badan');
            $table->string('penderita_penyakit')->default(null);
            $table->string('penyandang_disabilitas')->default(null);
            $table->string('nama_bank')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('status_siswa')->enum('Aktif', 'Non Aktif')->default('Aktif');
            $table->foreignId('riwayat_kelas')->constrained('kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
