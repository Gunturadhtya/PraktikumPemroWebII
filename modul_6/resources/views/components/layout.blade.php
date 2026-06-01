<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-white shadow-sm p-4 mb-6">
        <div class="container mx-auto max-w-5xl">
            <a href="{{ route('home') }}" class="text-blue-600 hover:underline mr-4 font-semibold">Home</a>
            <a href="{{ route('profile') }}" class="text-blue-600 hover:underline font-semibold">Profile</a>
        </div>
    </nav>
    <main class="flex-grow flex flex-col justify-center">
        {{ $slot }}
    </main>
</body>

</html>