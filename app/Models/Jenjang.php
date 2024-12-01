<?php

namespace App\Models;

use App\Models\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenjang extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function tingkat(): HasMany
    {
        return $this->hasMany(Tingkat::class);
    }
}
