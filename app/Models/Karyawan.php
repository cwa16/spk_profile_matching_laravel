<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'id',
        'jabatan_id',
        'golongan_id',
        'nama',
        'nik',
        'jenis_kelamin',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function nilai()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class);
    }
}
