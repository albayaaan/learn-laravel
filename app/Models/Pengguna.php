<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    public function telepon()
    {
        return $this->hasOne(Telepon::class);
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }

    public function hadiah()
    {
        return $this->belongsToMany(Hadiah::class);
    }
}
