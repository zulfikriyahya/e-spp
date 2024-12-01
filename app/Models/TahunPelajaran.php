<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunPelajaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'isActive',
    ];
    protected $casts = [
        'id' => 'string',
    ];
}
