<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemasukkan extends Model
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
        'jenis_pemasukkan_id',
        'bulan_id',
        'tahun_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis_pemasukkan_id' => 'integer',
        'bulan_id' => 'integer',
        'tahun_id' => 'integer',
    ];

    public function jenis_pemasukkan(): BelongsTo
    {
        return $this->belongsTo(JenisPemasukkan::class);
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
