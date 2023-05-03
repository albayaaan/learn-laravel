<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                CRUD Data Mahasiswa - <a href="https://www.malasngoding.com/category/laravel"
                    target="_blank">www.malasngoding.com</a>
            </div>
            <div class="card-body">
                <a href="/mahasiswa/tambah" class="btn btn-primary">Input Mahasiswa Baru</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>
                                    <a href="/mahasiswa/edit/{{ $mahasiswa->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/mahasiswa/hapus/{{ $mahasiswa->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
