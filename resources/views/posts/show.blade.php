@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4 bg-white shadow rounded-lg">
        <!-- Post Title and Content -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
            <p class="text-gray-700 mt-2">{{ $post->content }}</p>
            <p class="text-sm text-gray-500 mt-4">By: {{ $post->user ? $post->user->name : 'Unknown' }}</p>
        </div>

        <!-- Comments Section -->
        <div class="border-t pt-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Comments</h3>
            @forelse($post->comments as $comment)
                <div class="mb-4 p-4 bg-gray-100 rounded-lg shadow-sm">
                    <p class="text-gray-800">{{ $comment->comment }}</p>
                    <p class="text-sm text-gray-500 mt-2">By: {{ $comment->user ? $comment->user->name : 'Guest' }}</p>

                    @auth
                        @if(auth()->id() == $comment->user_id || auth()->id() == $post->user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2 inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p class="text-gray-600">No comments yet.</p>
            @endforelse
        </div>

        <!-- Add Comment Form -->
        @auth
            <div class="mt-6">
                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="form-group">
                        <textarea name="comment" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="4" placeholder="Add your comment" required></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Add Comment</button>
                </form>
            </div>
        @else
            <p class="mt-4 text-gray-600">You must be logged in to add a comment.</p>
        @endauth
    </div>
@endsection
