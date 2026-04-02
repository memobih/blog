<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<nav class="bg-white shadow">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between">
        <a href="{{ route('posts.index') }}" class="font-bold text-xl text-indigo-600">
            Posts App
        </a>

        <a href="{{ route('posts.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
            + Create Post
        </a>
    </div>
</nav>

<main class="max-w-6xl mx-auto p-6">
    @yield('content')
</main>

</body>
</html>