<!DOCTYPE html>
<html>

<head>
    <title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<style type="text/css">
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>


<body>

    <h2>www.malasngoding.com</h2>
    <h3>Data Pegawai</h3>

    <p>Cari Data Pegawai :</p>
    <form action="/pegawai/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <br />

    <a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>

    <br />
    <br />

    <table border="1">
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
                    <a href="/pegawai/edit/{{ $pegawai->pegawai_id }}">Edit</a>
                    |
                    <a href="/pegawai/hapus/{{ $pegawai->pegawai_id }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>

    <br />
    Halaman : {{ $pegawais->currentPage() }} <br />
    Jumlah Data : {{ $pegawais->total() }} <br />
    Data Per Halaman : {{ $pegawais->perPage() }} <br />


    {{ $pegawais->links() }}

</body>

</html>
