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
        'result',
        'created_at'
    ];

    public function pasarans()
    {
        return $this->belongsTo(Pasaran::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('l, d / m / Y' );
    }
}