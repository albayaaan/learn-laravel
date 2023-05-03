<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('pengguna', ['penggunas' => $penggunas]);
        // $pengguna = Pengguna::find(1)->telepon->nomor_telepon;
        // dd($pengguna);
    }
}
