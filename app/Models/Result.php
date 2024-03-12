<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'table_result';

    protected $fillable = [
        'id',
        'pasaran_id',
        'shio',
        'result_1',
        'result_2',
        'result_3',
        'created_at'
    ];

    public function pasarans()
    {
        return $this->belongsTo(Pasaran::class);
    }


    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        setlocale(LC_TIME, 'id_ID'); // Atur lokal ke bahasa Indonesia
        $carbonDate->setTimezone('Asia/Jakarta'); // Atur zona waktu
        return $carbonDate->translatedFormat('l, d F Y');
    }


}