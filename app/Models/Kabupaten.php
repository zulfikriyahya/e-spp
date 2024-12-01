<?php

namespace App\Models;

use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'provinsi_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function kecamatan(): HasMany
    {
        return $this->hasMany(Kecamatan::class);
    }
    public function instansi(): HasMany
    {
        return $this->hasMany(Instansi::class);
    }
}
