<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NTotal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bobot',
        'ncfp',
        'nsfp',
        'n_totalp',
        'ncfs',
        'nsfs',
        'n_totals',
        'ncfk',
        'nsfk',
        'ntotalk',
    ];
}
