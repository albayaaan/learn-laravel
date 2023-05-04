<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use File;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        $gambars = Gambar::all();
        return view('upload', ['gambars' => $gambars]);
    }

    public function upload_proses(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Gambar::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
    }

    public function hapus($id)
    {
        $gambar = Gambar::where('id',$id)->first();

        File::delete('data_file/'.$gambar->file);
        Gambar::find($id)->delete();

        return redirect()->back();
    }
}
