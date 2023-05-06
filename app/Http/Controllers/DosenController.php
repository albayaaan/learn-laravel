<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $nama = "Tsaqib Abyan";
        $matkuls = ["Algoritma & Pemrograman","Kalkulus","Pemrograman Web"];
        // return view('biodata', ['nama' => $nama, 'matkuls' => $matkuls]);
    }
}
