<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama'
    ];
    protected $casts = [
        'id' => 'string',
    ];
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}
