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

                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif

                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $sukses }}</strong>
                    </div>
                @endif

                <p>Cari Data Pegawai :</p>
                <form action="/pegawai/cari" method="GET" class="form-inline">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .."
                        value="{{ old('cari') }}">
                    <input class="btn btn-primary ml-3" type="submit" value="CARI">
                </form>

                <br />

                <a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
                <a href="/pegawai/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                <button type="button" class="btn btn-warning mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>

                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/pegawai/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    {{ csrf_field() }}

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <a href="/pegawai/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

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
                                <a class="btn btn-warning btn-sm" href="/pegawai/edit/{{ $pegawai->id }}">Edit</a>
                                |
                                <a class="btn btn-danger btn-sm" href="/pegawai/hapus/{{ $pegawai->id }}">Hapus</a>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>
