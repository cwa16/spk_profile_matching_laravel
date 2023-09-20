<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = [
        'nilai',
        'karyawan_id',
        'sub_kriteria_id'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

}
