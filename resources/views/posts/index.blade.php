<x-layout title="Posts">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    @auth
        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create Post
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline ml-2">
                @csrf
                <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Login to Create Post
        </a>
    @endauth

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6">
        @forelse ($posts as $post)
            <div class="border p-4 mb-2">
                @if ($post->image)
                    <img src="{{ asset('storage/posts/' . $post->image) }}" class="w-full h-48 object-cover mb-2">
                @endif
                <h2 class="font-bold">{{ $post->title }}</h2>
                @if ($post->slug)
                    <p class="text-gray-400 text-xs">Slug: {{ $post->slug }}</p>
                @endif
                <p class="text-gray-600 text-sm">By {{ $post->user->name }}</p>
                <p class="text-gray-500 text-xs">{{ $post->created_at->format('F j, Y, g:i a') }}</p>

                <a href="{{ route('posts.show', $post) }}" class="text-blue-500">View</a>
                @if(auth()->check() && auth()->id() === $post->user_id)
                    <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 ml-2">Edit</a>

                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 ml-2">Delete</button>
                    </form>
                @endif
            </div>
        @empty
            <p>No posts yet</p>
        @endforelse
    </div>

    @if(auth()->check())
        <div class="mt-6 border p-4">
            <h3 class="font-bold mb-2">Deleted Posts</h3>
            @forelse (\App\Models\Post::onlyTrashed()->where('user_id', auth()->id())->get() as $deletedPost)
                <div class="border p-2 mb-2 bg-gray-100">
                    <h4 class="font-semibold">{{ $deletedPost->title }}</h4>
                    <form method="POST" action="{{ route('posts.restore', $deletedPost->id) }}" class="inline">
                        @csrf
                        <button class="bg-green-500 text-white px-2 py-1 rounded text-sm">Restore</button>
                    </form>
                </div>
            @empty
                <p class="text-gray-500">No deleted posts</p>
            @endforelse
        </div>
    @endif

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>
