<?php

namespace App\Models;

use App\Models\Instansi;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'kecamatan_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function instansi(): HasMany
    {
        return $this->hasMany(Instansi::class);
    }
}
