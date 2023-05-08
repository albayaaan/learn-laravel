<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\PerusahaanDetail;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function show($id)
    {
        // $data = Perusahaan::with(['detail', 'brand'])->where('id', $id)->first();
        // $data = PerusahaanDetail::with(['perusahaan', 'perusahaan.brand'])->where('id', $id)->first();
        $data = Perusahaan::with(['detail', 'brand', 'donatur'])->where('id', $id)->first();
        // $data->donatur()->attach(2);
        // $data->donatur()->detach(1);
        return response()->json($data);
        // return response()->json($perusahaan->with('detail'));
    }
}
