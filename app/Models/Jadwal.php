<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'table_jadwal';

    protected $fillable = [
        'id',
        'pasaran_id',
        'jadwal_tutup',
        'jadwal_undi',
        'situs_resmi',
        'created_at',
    ];

    public function pasarans()
    {
        return $this->belongsTo(Pasaran::class);
    }

    public function pasaran()
    {
        return $this->hasOne(Pasaran::class, "id", "pasaran_id");
    }

}
