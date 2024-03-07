<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Keluhan extends Model
{
    use HasFactory;

    protected $table = 'table_keluhan';

    protected $fillable = [
        'id',
        'username',
        'email',
        'number_phone',
        'title_keluhan',
        'description_keluhan',
        'created_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        setlocale(LC_TIME, 'id_ID');
        return $carbonDate->translatedFormat('l, d / m / Y');
    }
}
