<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'nominal',
        'kwitansi',
        'siswa_id',
        'bulan_id',
        'tahun_id',
        'jenis_pembayaran_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'siswa_id' => 'integer',
        'bulan_id' => 'integer',
        'tahun_id' => 'integer',
        'jenis_pembayaran_id' => 'integer',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class);
    }

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    public function jenis_pembayaran(): BelongsTo
    {
        return $this->belongsTo(JenisPembayaran::class);
    }

    public function debit(): HasMany
    {
        return $this->hasMany(Debit::class);
    }
}
