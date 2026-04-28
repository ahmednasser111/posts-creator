<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Laravel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
    {{ $slot }}
</body>
</html>