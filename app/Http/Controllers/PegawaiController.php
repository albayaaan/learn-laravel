<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PegawaiController extends Controller
{
    public function index()
    {
        // $pegawais = DB::table('pegawai')->paginate();
        $pegawais = Pegawai::paginate(10);
        return view('index', ['pegawais' => $pegawais]);
    }

    public function formulir()
    {
        return view('formulir');
    }

    public function proses(Request $request)
    {
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        return "Nama: ".$nama.", Alamat: ".$alamat;
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
        ]);

        return redirect('/pegawai');
    }

    public function edit($id)
    {
        $pegawais = DB::table('pegawai')->where('pegawai_id', $id)->get();
        return view('edit', ['pegawais' => $pegawais]);
    }

    public function update(Request $request)
    {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
        ]);

        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->delete();
        return redirect('/pegawai');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pegawais = DB::table('pegawai')->where('pegawai_nama','like','%'.$cari.'%')->paginate();
        return view('index', ['pegawais' => $pegawais]);
    }

    public function cetak_pdf()
    {
        $pegawais = Pegawai::all();
        $pdf = PDF::loadView('pegawai_pdf',['pegawais' => $pegawais]);
        // return $pdf->download('laporan-pegawai.pdf');
        return $pdf->stream();
        // dd($pdf);
    }
}
