<?php

namespace App\Models;

use App\Models\Instansi;
use App\Models\Kabupaten;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'kabupaten_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }
    public function kelurahan(): HasMany
    {
        return $this->hasMany(Kelurahan::class);
    }
    public function instansi(): HasMany
    {
        return $this->hasMany(Instansi::class);
    }
}
