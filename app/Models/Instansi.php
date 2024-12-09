<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instansi extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'npsn',
        'nss',
        'logo',
        'alamat',
        'website',
        'email',
        'telepon',
        'nama_bank',
        'nama_rekening',
        'nomor_rekening',
        'pimpinan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pimpinan_id' => 'integer',
    ];

    public function pimpinan(): BelongsTo
    {
        return $this->belongsTo(Pimpinan::class);
    }
}
