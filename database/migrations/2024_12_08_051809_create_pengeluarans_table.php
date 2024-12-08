<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->integer('nominal');
            $table->string('kwitansi');
            $table->foreignId('bulan_id')->constrained('bulans');
            $table->foreignId('tahun_id')->constrained('tahuns');
            $table->foreignId('jenis_pengeluaran_id')->constrained('jenis_pengeluarans');
            $table->foreignId('instansi_id')->constrained('instansis');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
