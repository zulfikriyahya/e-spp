<?php

namespace App\Models;

use App\Models\Negara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instansi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'logo',
        'stempel',
        'npsn',
        'telepon',
        'email',
        'website',
        'status_instansi',
        'nama_kepala_yayasan',
        'nama_kepala_paud',
        'nip_kepala_paud',
        'tte_kepala_paud',
        'akreditasi_paud',
        'kop_surat_paud',
        'nama_kepala_tk',
        'nip_kepala_tk',
        'tte_kepala_tk',
        'akreditasi_tk',
        'kop_surat_tk',
        'nama_kepala_sd',
        'nip_kepala_sd',
        'tte_kepala_sd',
        'akreditasi_sd',
        'kop_surat_sd',
        'nama_kepala_smp',
        'nip_kepala_smp',
        'tte_kepala_smp',
        'akreditasi_smp',
        'kop_surat_smp',
        'nama_kepala_sma',
        'nip_kepala_sma',
        'tte_kepala_sma',
        'akreditasi_sma',
        'kop_surat_sma',
        'nama_bank',
        'nama_rekening',
        'nomor_rekening',
        'alamat',
        'negara_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    public function negara(): BelongsTo
    {
        return $this->belongsTo(Negara::class);
    }
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
