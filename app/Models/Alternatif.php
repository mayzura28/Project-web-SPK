<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Kriteria, Nilai, SubKriteria};

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_alt',
        'kode'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class);
    }

    public function SubKriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
