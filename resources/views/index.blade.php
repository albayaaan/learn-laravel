<!DOCTYPE html>
<html>

<head>
    <title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">www.malasngoding.com</h2>
                <h3>Data Pegawai</h3>

                <p>Cari Data Pegawai :</p>
                <form action="/pegawai/cari" method="GET" class="form-inline">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .."
                        value="{{ old('cari') }}">
                    <input class="btn btn-primary ml-3" type="submit" value="CARI">
                </form>

                <br />

                <a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>

                <br />
                <br />

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach ($pegawais as $pegawai)
                        <tr>
                            <td>{{ $pegawai->pegawai_nama }}</td>
                            <td>{{ $pegawai->pegawai_jabatan }}</td>
                            <td>{{ $pegawai->pegawai_umur }}</td>
                            <td>{{ $pegawai->pegawai_alamat }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                    href="/pegawai/edit/{{ $pegawai->pegawai_id }}">Edit</a>
                                |
                                <a class="btn btn-danger btn-sm"
                                    href="/pegawai/hapus/{{ $pegawai->pegawai_id }}">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <br />
                Halaman : {{ $pegawais->currentPage() }} <br />
                Jumlah Data : {{ $pegawais->total() }} <br />
                Data Per Halaman : {{ $pegawais->perPage() }} <br />


                {{ $pegawais->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
