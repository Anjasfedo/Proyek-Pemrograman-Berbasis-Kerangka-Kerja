<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Buku</h1>

        @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
        @endif

        <form action="{{ route('book.update', [$dataBook->id]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan metode PUT untuk pembaruan -->

            <div class="mb-3">
                <label for="inputTitle" class="form-label">Judul</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $dataBook->title }}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPenulis" class="form-label">Penulis</label>
                <select class="form-control" id="inputPenulis" name="author_id">
                    <option value="">Pilih Penulis</option>
                    @foreach ($dataAuthors as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $dataBook->author_id) selected @endif>{{ $item->author_name }}</option>
                    @endforeach
                </select>
                @error('author_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="inputDescription" name="description">{{ $dataBook->description }}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
