<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengeluaran extends Model
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
        'bulan_id',
        'tahun_id',
        'jenis_pengeluaran_id',
        'instansi_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bulan_id' => 'integer',
        'tahun_id' => 'integer',
        'jenis_pengeluaran_id' => 'integer',
        'instansi_id' => 'integer',
    ];

    public function jenis_pengeluaran(): BelongsTo
    {
        return $this->belongsTo(JenisPengeluaran::class);
    }

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class);
    }

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class);
    }
}
