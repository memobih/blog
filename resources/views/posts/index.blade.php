@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">All Posts</h1>

<div class="grid md:grid-cols-2 gap-4">

@foreach($posts as $post)
    <div class="bg-white rounded-xl shadow p-5 border">

        <div class="flex justify-between">
            <h2 class="font-bold text-lg">{{ $post->title }}</h2>

            <span class="text-xs text-gray-500">
                {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }}
            </span>
        </div>

        <p class="text-gray-600 mt-2">
            {{ Str::limit($post->description, 120) }}
        </p>

        <p class="text-sm text-gray-400 mt-1">
            By: {{ $post->user->name ?? 'Unknown' }}
        </p>

        <div class="flex gap-3 mt-4 text-sm">

            <a href="{{ route('posts.show', $post->id) }}"
               class="text-blue-600">View</a>

            <a href="{{ route('posts.edit', $post->id) }}"
               class="text-yellow-600">Edit</a>

            @if($post->deleted_at)
                <a href="{{ route('posts.restore', $post->id) }}"
                   class="text-green-600">Restore</a>
            @else
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            @endif

        </div>

    </div>
@endforeach

</div>

<div class="mt-6">
    {{ $posts->links() }}
</div>

@endsection