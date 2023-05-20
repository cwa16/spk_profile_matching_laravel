<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'aspek',
        'nama_kriteria',
        'nilai_standar',
        'faktor',
        'persentase',
    ];
}
