@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-bold text-gray-800">All Posts</h1>
@endsection

@section('content')
@auth
@auth
    <div class="flex justify-end mb-4">
        <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Create New Post</a>
    </div>
@endauth
@endauth

    <div class="space-y-6">
        @foreach($posts as $post)
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold text-gray-800">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>

                </h2>
                <p class="text-gray-700 mt-2">{{ Str::limit($post->content, 100) }}</p>
                <p class="text-sm text-gray-500 mt-4">By: {{ $post->user->name }}</p>

                <div class="mt-4 flex space-x-4">
                    @if(auth()->check() && auth()->id() == $post->user_id)
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
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
