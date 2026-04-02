@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Post</h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}"
      class="bg-white p-6 rounded-xl shadow space-y-4">

@csrf
@method('PUT')

{{-- TITLE --}}
<div>
    <input type="text" name="title"
           value="{{ old('title', $post->title) }}"
           class="w-full border p-2 rounded @error('title') border-red-500 @enderror">

    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- DESCRIPTION --}}
<div>
    <textarea name="description"
              class="w-full border p-2 rounded @error('description') border-red-500 @enderror">{{ old('description', $post->description) }}</textarea>

    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- USER --}}
<div>
    <select name="user_id"
            class="w-full border p-2 rounded @error('user_id') border-red-500 @enderror">

        @foreach($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach

    </select>

    @error('user_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button class="bg-yellow-500 text-white px-4 py-2 rounded">
    Update
</button>

</form>

@endsection