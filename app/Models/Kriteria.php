<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubKriteria;
use App\Models\Bobot;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kriteria','kode', 'atribute', 'bobot'
    ];

    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }

    public function bobot()
    {
        return $this->hasOne(Bobot::class);
    }
}
