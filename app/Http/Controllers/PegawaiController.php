<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
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
        Pegawai::insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
        ]);

        return redirect('/pegawai');
    }

    public function edit($id)
    {
        $pegawais = Pegawai::where('id', $id)->get();
        return view('edit', ['pegawais' => $pegawais]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jabatan' => 'required',
            'umur' => 'required',
            'alamat' => 'required'
         ]);

        Pegawai::find($request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
        ]);

        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        $pegawai = Pegawai::where('id', $id)->delete();
        return redirect('/pegawai');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pegawais = Pegawai::where('pegawai_nama','like','%'.$cari.'%')->paginate();
        return view('index', ['pegawais' => $pegawais]);
    }

    public function cetak_pdf()
    {
        $pegawais = Pegawai::all();
        $pdf = PDF::loadView('pegawai_pdf',['pegawais' => $pegawais]);
        return $pdf->download('laporan-pegawai.pdf');
        // return $pdf->stream();
        // dd($pdf);
    }

    public function export_excel()
    {
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_pegawai',$nama_file);

        Excel::import(new PegawaiImport, public_path('/file_pegawai/'.$nama_file));

        Session::flash('sukses', 'Data pegawai berhasil di import');

        return redirect('/pegawai');
    }
}
