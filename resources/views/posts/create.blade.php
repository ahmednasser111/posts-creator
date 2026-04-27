<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}" class="max-w-md space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Title</label>
            <input 
                type="text" 
                name="title" 
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
            ></textarea>
            @error('body')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Submit
        </button>
    </form>

    <a href="{{ route('posts.index') }}" class="block mt-4 text-gray-600">Back</a>

</body>
</html>
