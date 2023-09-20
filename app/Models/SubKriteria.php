<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriteria';
    protected $fillable = [
        'kriteria_id',
        'nama_sub_kriteria',
        'faktor',
        'nilai',
        'persentase',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function nilaii()
    {
        return $this->hasMany(Penilaian::class, 'sub_kriteria_id', 'id');
    }
}
