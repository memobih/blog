<head>
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">

    <h1 class="text-center mb-4">📌 Posts</h1>

    <a href="/posts/create" class="btn btn-primary mb-3">+ Add Post</a>

    @foreach($posts as $post)
        <div class="card mb-3 shadow">
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->content }}</p>

                <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form method="POST" action="/posts/{{ $post->id }}" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach

</div>