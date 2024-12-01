<?php

namespace App\Models;

use App\Models\Instansi;
use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Negara extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama'
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function provinsi(): HasMany
    {
        return $this->hasMany(Provinsi::class);
    }
    public function instansi(): HasMany
    {
        return $this->hasMany(Instansi::class);
    }
}
