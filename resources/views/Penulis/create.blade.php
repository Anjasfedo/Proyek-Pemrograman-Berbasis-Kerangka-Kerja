<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambahkan Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="my-4">Tambahkan Penulis</h1>

        <div class="card mx-auto">
            <div class="card-body">
                <form action="{{ route('penulis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputNamaPenulis" class="form-label">Nama Penulis</label>
                        <input type="text" class="form-control" id="inputNamaPenulis" name="nama_penulis" value="{{ old('nama_penulis') }}">
                        @error('nama_penulis')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for "inputNamaPena" class="form-label">Nama Pena</label>
                        <input type="text" class="form-control" id="inputNamaPena" name="nama_pena" value="{{ old('nama_pena') }}">
                        @error('nama_pena')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="inputJenisKelamin" name="jenis_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputTanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="inputTanggalLahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputTempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('penulis.index') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
