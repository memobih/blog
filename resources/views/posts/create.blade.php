@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Create Post</h1>

<form method="POST" action="{{ route('posts.store') }}"
      class="bg-white p-6 rounded-xl shadow space-y-4">

@csrf

{{-- TITLE --}}
<div>
    <input type="text" name="title"
           value="{{ old('title') }}"
           placeholder="Title"
           class="w-full border p-2 rounded @error('title') border-red-500 @enderror">

    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- DESCRIPTION --}}
<div>
    <textarea name="description"
              placeholder="Description"
              class="w-full border p-2 rounded @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>

    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- USER --}}
<div>
    <select name="user_id"
            class="w-full border p-2 rounded @error('user_id') border-red-500 @enderror">

        <option value="">Select User</option>

        @foreach($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach

    </select>

    @error('user_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button class="bg-indigo-600 text-white px-4 py-2 rounded">
    Save
</button>

</form>

@endsection