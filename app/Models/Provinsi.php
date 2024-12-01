<?php

namespace App\Models;

use App\Models\Negara;
use App\Models\Instansi;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'negara_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function negara(): BelongsTo
    {
        return $this->belongsTo(Negara::class);
    }
    public function kabupaten(): HasMany
    {
        return $this->hasMany(Kabupaten::class);
    }
    public function instansi(): HasMany
    {
        return $this->hasMany(Instansi::class);
    }
}
