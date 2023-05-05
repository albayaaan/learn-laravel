<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function tampil(Request $request)
    {
        if ($request->session()->has('nama')) {
            echo $request->session()->get('nama');
        } else {
            echo "tidak ada data dalam session";
        }
    }

    public function buat(Request $request)
    {
        $request->session()->put('nama', 'Tsaqib Abyan');
        echo "session telah ditambahkan";
    }

    public function hapus(Request $request)
    {
        $request->session()->forget('nama');
        echo "session telah dihapus";
    }
}
