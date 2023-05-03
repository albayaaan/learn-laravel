<!DOCTYPE html>
<html>

<head>
    <title>Tutorial Laravel #23 : Relasi One To One Eloquent</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h3 class="text-center"><a href="https://www.malasngoding.com">www.malasngoding.com</a></h3>
                <h5 class="text-center my-4">Eloquent One To One Relationship</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Nomor Telepon</th>
                            <th>Pekerjaan</th>
                            <th>Hadiah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penggunas as $pengguna)
                            <tr>
                                <td>{{ $pengguna->nama }}</td>
                                <td>{{ $pengguna->telepon->nomor_telepon ?? '-' }}</td>
                                <td>
                                    @foreach ($pengguna->pekerjaan as $pekerjaan)
                                        <li> {{ $pekerjaan->pekerjaan }} </li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pengguna->hadiah as $hadiah)
                                        <li> {{ $hadiah->hadiah }} </li>
                                    @endforeach
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
