<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    public function detail()
    {
        return $this->hasOne(PerusahaanDetail::class);
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function donatur()
    {
        return $this->belongsToMany(Donatur::class);
    }
}
