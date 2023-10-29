<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Penulis</h1>

        @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
        @endif

        <form action="{{ route('penulis.update', [$penulis->id]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan metode PUT untuk pembaruan -->

            <div class="mb-3">
                <label for="inputNamaPenulis" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control" id="inputNamaPenulis" name="nama_penulis" value="{{ $penulis->nama_penulis }}">
            </div>
            <div class="mb-3">
                <label for="inputNamaPena" class="form-label">Nama Pena</label>
                <input type="text" class="form-control" id="inputNamaPena" name="nama_pena" value="{{ $penulis->nama_pena }}">
            </div>
            <div class="mb-3">
                <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="inputJenisKelamin" name="jenis_kelamin">
                    <option value="Laki-laki" {{ $penulis->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $penulis->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    <option value="Lainnya" {{ $penulis->jenis_kelamin == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputTanggalLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="inputTanggalLahir" name="tanggal_lahir" value="{{ $penulis->tanggal_lahir }}">
            </div>
            <div class="mb-3">
                <label for="inputTempatLahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir" value="{{ $penulis->tempat_lahir }}">
            </div>
            <a href="{{ route('penulis.index') }}" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
