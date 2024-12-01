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
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('logo');
            $table->string('stempel')->nullable();
            $table->unsignedInteger('npsn');
            $table->string('telepon');
            $table->string('email');
            $table->string('website');
            $table->string('status_instansi')->enum('Negeri', 'Swasta');
            $table->string('nama_kepala_yayasan');
            $table->string('nama_kepala_paud');
            $table->unsignedInteger('nip_kepala_paud')->nullable();
            $table->string('tte_kepala_paud')->nullable();
            $table->string('akreditasi_paud')->enum('A', 'B', 'C', 'D');
            $table->string('kop_surat_paud');
            $table->string('nama_kepala_tk');
            $table->unsignedInteger('nip_kepala_tk')->nullable();
            $table->string('tte_kepala_tk')->nullable();
            $table->string('akreditasi_tk')->enum('A', 'B', 'C', 'D');
            $table->string('kop_surat_tk');
            $table->string('nama_kepala_sd');
            $table->unsignedInteger('nip_kepala_sd')->nullable();
            $table->string('tte_kepala_sd')->nullable();
            $table->string('akreditasi_sd')->enum('A', 'B', 'C', 'D');
            $table->string('kop_surat_sd');
            $table->string('nama_kepala_smp');
            $table->unsignedInteger('nip_kepala_smp')->nullable();
            $table->string('tte_kepala_smp')->nullable();
            $table->string('akreditasi_smp')->enum('A', 'B', 'C', 'D');
            $table->string('kop_surat_smp');
            $table->string('nama_kepala_sma');
            $table->unsignedInteger('nip_kepala_sma')->nullable();
            $table->string('tte_kepala_sma')->nullable();
            $table->string('akreditasi_sma')->enum('A', 'B', 'C', 'D');
            $table->string('kop_surat_sma');
            $table->string('nama_bank');
            $table->string('nama_rekening');
            $table->unsignedInteger('nomor_rekening');
            $table->string('alamat');
            $table->foreignId('negara_id')->constrained('negaras')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('provinsi_id')->constrained('provinsis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansis');
    }
};
