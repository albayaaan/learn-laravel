<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            'pegawai_nama' => $row[1],
            'pegawai_jabatan' => $row[2],
            'pegawai_umur' => $row[3],
            'pegawai_alamat' => $row[4],
        ]);
    }
}
