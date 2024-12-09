<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debit extends Model
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
        'bulan_id',
        'tahun_id',
        'pemasukkan_id',
        'pembayaran_id',
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
        'pemasukkan_id' => 'integer',
        'pembayaran_id' => 'integer',
    ];

    public function pemasukkan(): BelongsTo
    {
        return $this->belongsTo(Pemasukkan::class);
    }

    public function pembayaran(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class);
    }

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }
}
