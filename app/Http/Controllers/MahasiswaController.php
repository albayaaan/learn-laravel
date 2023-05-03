<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();

        return view('mahasiswa', ['mahasiswas' => $mahasiswas ]);
    }

    public function tambah()
    {
        return view('mahasiswa_tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa_edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        return redirect('/mahasiswa');
    }

    public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->back();
    }

    public function trash()
    {
        $mahasiswas = Mahasiswa::onlyTrashed()->get();
        return view('mahasiswa_trash',['mahasiswas' => $mahasiswas]);
    }

    public function kembalikan($id)
    {
        $mahasiswa = Mahasiswa::onlyTrashed()->where('id',$id);
        $mahasiswa->restore();
        return redirect()->back();
    }

    public function kembalikan_semua()
    {
        $mahasiswas = Mahasiswa::onlyTrashed();
        $mahasiswas->restore();
        return redirect()->back();
    }

    public function hapus_permanen($id)
    {
        $mahasiswa = Mahasiswa::onlyTrashed()->where('id',$id);
        $mahasiswa->forceDelete();
        return redirect()->back();
    }

    public function hapus_permanen_semua()
    {
        $mahasiswas = Mahasiswa::onlyTrashed();
        $mahasiswas->forceDelete();
        return redirect()->back();
    }
}
