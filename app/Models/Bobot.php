<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Kriteria, User};

class Bobot extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','kriteria_id','bobot'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
