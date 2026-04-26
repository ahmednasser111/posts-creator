<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

    <form method="POST" action="/posts/{{ $id }}" class="max-w-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Title</label>
            <input 
                type="text" 
                name="title" 
                value="{{ $post['title'] }}"
                class="w-full border rounded px-3 py-2"
            >
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>

    <a href="/posts" class="block mt-4 text-gray-600">Back</a>

</body>
</html>
