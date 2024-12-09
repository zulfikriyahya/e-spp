<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kredit extends Model
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
        'pengeluaran_id',
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
        'pengeluaran_id' => 'integer',
    ];

    public function pengeluaran(): BelongsTo
    {
        return $this->belongsTo(Pengeluaran::class);
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
