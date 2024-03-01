<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    use HasFactory;

    protected $table = 'table_pasaran';

    protected $fillable = [
        'id',
        'pasaran_id',
        'angka_main',
        'top_3d',
        'top_2d',
        'colok_bebas',
        'colok_2d',
        'shio_jitu',
        'created_at',
    ];

    public function pasarans()
    {
        return $this->belongsTo(Pasaran::class);
    }
}
