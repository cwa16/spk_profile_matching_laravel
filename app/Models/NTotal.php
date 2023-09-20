<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NTotal extends Model
{
    use HasFactory;
    protected $table = 'nilai_total';
    protected $fillable = [
       'tanggal',
       'subjek',
       'nama',
       'nilai'
    ];
}
