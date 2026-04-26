<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Post Details</h1>

    <div class="border p-4">
        <h2 class="text-xl font-semibold">{{ $post['title'] }}</h2>
    </div>

    <a href="/posts" class="block mt-4 text-blue-500">Back</a>

</body>
</html>
