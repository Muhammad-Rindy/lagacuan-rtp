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
        'name_pasaran',
        'jadwal_tutup',
        'jadwal_undi',
        'situs_resmi',
        'created_at',
    ];

}