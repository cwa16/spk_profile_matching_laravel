<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiFaktor extends Model
{
    use HasFactory;
    protected $table = 'nilai_faktor';
    protected $fillable = [
        'penilaian_id',
        'ncf',
        'nsf',
    ];
}
