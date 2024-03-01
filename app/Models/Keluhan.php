<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}