<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Alternatif, User};

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','user_id','ranking','nama'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
