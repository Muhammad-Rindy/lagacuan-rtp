<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'table_buku';

    protected $fillable = [
        'id',
        'image',
        'description',
        'created_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        setlocale(LC_TIME, 'id_ID');
        return $carbonDate->translatedFormat('l, d / m / Y');
    }
}