<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function index()
    {
        return view('notifikasi');
    }
    public function sukses()
    {
        Session::flash('sukses','ini notifikasi sukses');
        return redirect('pesan');
    }
    public function peringatan()
    {
        Session::flash('peringatan','ini notifikasi peringatan');
        return redirect('pesan');

    }
    public function gagal()
    {
        Session::flash('gagal','ini notifikasi gagal');
        return redirect('pesan');

    }
}
