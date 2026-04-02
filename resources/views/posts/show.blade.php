@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

<h1 class="text-2xl font-bold">{{ $post->title }}</h1>

<p class="text-gray-500 mt-1">
    {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }}
</p>

<p class="mt-4 text-gray-700">
    {{ $post->description }}
</p>

<p class="mt-2 text-sm text-gray-500">
    By: {{ $post->user->name }}
</p>

</div>

{{-- COMMENTS --}}
<div class="mt-6 bg-white p-6 rounded-xl shadow">

<h2 class="font-bold text-lg mb-4">Comments</h2>

<form method="POST" action="{{ route('comments.store') }}" class="mb-4">
    @csrf

    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <textarea name="body"
              class="w-full border p-2 rounded"
              placeholder="Write comment..."></textarea>

    <button class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded">
        Add Comment
    </button>
</form>

<div class="space-y-3">

@foreach($post->comments as $comment)
    <div class="border p-3 rounded">
        <p class="text-sm font-bold">{{ $comment->user->name }}</p>
        <p class="text-gray-600">{{ $comment->body }}</p>
    </div>
@endforeach

</div>

</div>

@endsection