<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="my-4">Daftar Penulis</h1>

        @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
        @endif

        <a href="{{ route('penulis.create') }}" class="btn btn-primary mb-3">Tambah</a>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nama Penulis</th>
                    <th scope="col">Nama Pena</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penulis as $item)
                <tr>
                    <td>{{ $item->nama_penulis }}</td>
                    <td>{{ $item->nama_pena }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>
                      <div class="btn-group">
                          <a href="{{ route('penulis.show', [$item->id]) }}" class="btn btn-success btn-rounded btn-sm m-2">Detail</a>
                          <a href="{{ route('penulis.edit', [$item->id]) }}" class="btn btn-primary btn-rounded btn-sm m-2">Edit</a>
                          <form action="{{ route('penulis.destroy', [$item->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-rounded btn-sm m-2" onclick="return confirm('Yakin ingin menghapus penulis ini?')">Hapus</button>
                          </form>
                      </div>
                  </td>                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
