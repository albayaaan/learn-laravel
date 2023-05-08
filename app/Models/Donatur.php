<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    public function perusahaan()
    {
        return $this->belongsToMany(Perusahaan::class);
    }
}
