<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kas extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'tahun_id',
        'bulan_id',
        'kredit_id',
        'debit_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tahun_id' => 'integer',
        'bulan_id' => 'integer',
        'kredit_id' => 'integer',
        'debit_id' => 'integer',
    ];

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class);
    }

    public function debit(): BelongsTo
    {
        return $this->belongsTo(Debit::class);
    }

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class);
    }
}
