<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'table_contacts';

    protected $fillable = [
        'id',
        'number_wa',
        'number_tele',
        'live_chat',
        'link_apk',
        'created_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        setlocale(LC_TIME, 'id_ID'); // Atur lokal ke bahasa Indonesia
        $carbonDate->setTimezone('Asia/Jakarta'); // Atur zona waktu
        return $carbonDate->translatedFormat('l, d F Y');
    }
}