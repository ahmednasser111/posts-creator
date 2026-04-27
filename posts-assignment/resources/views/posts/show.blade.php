<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Post Details</h1>

    <div class="border p-4">
        <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
        <p class="text-gray-600 text-sm mt-2">By {{ $post->user->name }}</p>
        <p class="mt-4">{{ $post->body }}</p>
    </div>

    @if(auth()->check() && auth()->id() === $post->user_id)
        <a href="{{ route('posts.edit', $post) }}" class="inline-block mt-4 text-yellow-500">Edit</a>
    @endif

    <a href="{{ route('posts.index') }}" class="block mt-4 text-blue-500">Back</a>

</body>
</html>
