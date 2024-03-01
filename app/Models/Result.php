<?php

namespace App\Models;

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
}
