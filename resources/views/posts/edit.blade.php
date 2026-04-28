<x-layout title="Edit Post">
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}" class="max-w-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Title</label>
            <input 
                type="text" 
                name="title" 
                value="{{ $post->title }}"
                class="w-full border rounded px-3 py-2"
            >
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Body</label>
            <textarea 
                name="body" 
                class="w-full border rounded px-3 py-2"
                rows="5"
            >{{ $post->body }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>

    <a href="{{ route('posts.index') }}" class="block mt-4 text-gray-600">Back</a>
</x-layout>
