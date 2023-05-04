<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CryptController extends Controller
{
    public function crypt()
    {
        $encrypted = Crypt::encryptString('Tsaqib Abyan');
        $decrypted = Crypt::decryptString($encrypted);

        echo "Hasil Enkripsi : ".$encrypted."<br/><br/>";
        echo "Hasil Dekripsi : ".$decrypted;
    }

    public function data()
    {
        $parameter =[
			'nama' => 'Tsaqib Abyan',
			'pekerjaan' => 'Programmer',
		];
        $encrypted = Crypt::encrypt($parameter);

        echo $encrypted."<br/><br/>";
        echo "<a href='/data/".$encrypted."'>Klik</a>";
    }

    public function data_proses($data)
    {
        $decrypted = Crypt::decrypt($data);
        echo "Nama : ".$decrypted["nama"]."<br/><br/>";
        echo "Nama : ".$decrypted["pekerjaan"];
    }

    public function hash()
    {
        $password = Hash::make('halo123');
        echo $password;
    }
}
