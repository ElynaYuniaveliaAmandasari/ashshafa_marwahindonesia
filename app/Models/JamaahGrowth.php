<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamaahGrowth extends Model
{
    use HasFactory;

    protected $table = 'jamaah_growth';

    protected $fillable = [
        'tahun',
        'jumlah',
    ];
}

