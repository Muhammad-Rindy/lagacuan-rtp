<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasaran extends Model
{
    use HasFactory;

    protected $table = 'table_pasaran';

    protected $fillable = [
        'id',
        'name_pasaran',
        'image',
        'created_at',
    ];

    public function results()
    {
        return $this->hasMany(Result::class, 'pasaran_id', 'id');
    }

    public function predictions()
    {
        return $this->hasMany(Prediksi::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        setlocale(LC_TIME, 'id_ID'); // Atur lokal ke bahasa Indonesia
        $carbonDate->setTimezone('Asia/Jakarta'); // Atur zona waktu
        return $carbonDate->translatedFormat('l, d F Y');
    }

}
