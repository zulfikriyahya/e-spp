<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Jenjang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tingkat extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'jenjang_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class);
    }
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}
