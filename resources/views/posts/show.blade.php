<x-layout title="View Post">
    <h1 class="text-2xl font-bold mb-4">Post Details</h1>

    <div class="border p-4">
        <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
        <p class="text-gray-600 text-sm mt-2">By {{ $post->user->name }}</p>
        <p class="text-gray-500 text-xs">{{ $post->created_at->format('F j, Y, g:i a') }}</p>
        <p class="mt-4">{{ $post->body }}</p>
    </div>

    @if(auth()->check() && auth()->id() === $post->user_id)
        <a href="{{ route('posts.edit', $post) }}" class="inline-block mt-4 text-yellow-500">Edit</a>
    @endif

    <a href="{{ route('posts.index') }}" class="block mt-4 text-blue-500">Back</a>

    <div class="mt-8 border p-4">
        <h3 class="text-lg font-bold mb-4">Comments</h3>
        
        @if(auth()->check())
            <form method="POST" action="{{ route('comments.store') }}" class="mb-6">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div>
                    <textarea name="body" class="w-full border rounded px-3 py-2" rows="3" placeholder="Add a comment..." required minlength="5"></textarea>
                </div>
                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Add Comment</button>
            </form>
        @else
            <p class="text-gray-500 mb-4"><a href="{{ route('login') }}" class="text-blue-500">Login</a> to add comments</p>
        @endif

        @forelse ($post->comments as $comment)
            <div class="border p-3 mb-2 bg-gray-50">
                <p class="font-semibold">{{ $comment->user->name }}</p>
                <p class="text-gray-500 text-xs">{{ $comment->created_at->format('F j, Y, g:i a') }}</p>
                <p class="mt-1">{{ $comment->body }}</p>
                @if(auth()->check() && auth()->id() === $comment->user_id)
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="inline mt-2" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 text-sm">Delete</button>
                    </form>
                @endif
            </div>
        @empty
            <p class="text-gray-500">No comments yet</p>
        @endforelse
    </div>
</x-layout>
