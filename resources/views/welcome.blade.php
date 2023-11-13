<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eloquent Relationships : Relasi One to Many</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="text-center my-4">Laravel Eloquent Relationship : One To Many</h5>
                <a href="{{ route('posts.index') }}" class="btn btn-md btn-success mb-3">Menu Post</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul Post</th>
                            <th>Gambar</th>
                            <th>Konten</th>
                            <th>Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px">
                                </td>
                                <td>{!! $post->content !!}</td>
                                <td>
                                    @foreach($post->comments()->get() as $comment)
                                        <div class="card shadow-sm mb-2">
                                            <div class="card-body">
                                                <i class="fa fa-comments"></i> {{ $comment->comment }}
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                    <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <a href="{{ route('comments.create', $post->id) }}" class="btn btn-md btn-success mb-3">Tambah Komen</a>
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