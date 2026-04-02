<head>
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <h2 class="mb-4"> Add New Post</h2>

    <form method="POST" action="/posts">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="/posts" class="btn btn-secondary">Back</a>
    </form>
</div>