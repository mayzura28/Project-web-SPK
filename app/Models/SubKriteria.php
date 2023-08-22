<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Nilai, Kriteria};


class SubKriteria extends Model
{
    use HasFactory;
    protected $fillable = ['kriteria_id', 'klasifikasi', 'nilai'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
