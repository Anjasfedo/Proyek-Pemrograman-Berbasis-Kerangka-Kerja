<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-3">Detail Penulis</h1>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Nama Penulis: {{ $dataAuthor->author_name }}</h2>
                <p class="card-text">Nama Pena: {{ $dataAuthor->pen_name ?? 'Tidak ada data' }}</p>
                <p class="card-text">Jenis Kelamin: {{ $dataAuthor->gender }}</p>
                <p class="card-text">Tanggal Lahir: {{ $dataAuthor->date_of_birth }}</p>
                <p class="card-text">Tempat Lahir: {{ $dataAuthor->place_of_birth }}</p>
            </div>
        </div>

        <a href="{{ route('author.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
