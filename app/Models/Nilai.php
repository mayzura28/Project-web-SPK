<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Alternatif, Kriteria, SubKriteria};

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = ['alternatif_id', 'kriteria_id', 'nilai'];

    
    public function alternatifs()
    {
        return $this->hasOne(Alternatif::class);
    }

    public function Kriteria()
    {
        return $this->hasOne(Kriteria::class);
    }

    public function SubKriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
