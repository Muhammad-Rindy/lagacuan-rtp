<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;

    protected $table = 'table_bukti';

    protected $fillable = [
        'id',
        'image',
        'title',
        'description',
        'created_at',
    ];
}