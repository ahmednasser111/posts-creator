<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    <a href="/posts/create" class="bg-blue-500 text-white px-4 py-2 rounded">
        Create Post
    </a>

    <div class="mt-6">
        @forelse ($posts as $id => $post)
            <div class="border p-4 mb-2">
                <h2 class="font-bold">{{ $post['title'] }}</h2>

                <a href="/posts/{{ $id }}" class="text-blue-500">View</a>
                <a href="/posts/{{ $id }}/edit" class="text-yellow-500 ml-2">Edit</a>

                <form method="POST" action="/posts/{{ $id }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 ml-2">Delete</button>
                </form>
            </div>
        @empty
            <p>No posts yet</p>
        @endforelse
    </div>

</body>
</html>
