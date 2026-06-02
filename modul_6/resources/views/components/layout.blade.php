<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex flex-col min-h-screen overflow-y-scroll">
    <nav class="bg-white shadow-sm p-4 mb-6">
        <div class="container mx-auto max-w-7xl flex items-center gap-8 justify-between">

            <h1 class="text-3xl font-bold text-gray-900 m-0">Modul 6</h1>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" @class([
                    'font-semibold transition-colors duration-200',
                    'text-blue-700 underline decoration-2 underline-offset-4' => request()->routeIs('home'),
                    'text-gray-500 hover:text-blue-600 hover:underline' => !request()->routeIs('home')
                ])>Home</a>

                <a href="{{ route('profile') }}" @class([
                    'font-semibold transition-colors duration-200',
                    'text-blue-700 underline decoration-2 underline-offset-4' => request()->routeIs('profile'),
                    'text-gray-500 hover:text-blue-600 hover:underline' => !request()->routeIs('profile')
                ])>Profile</a>
            </div>

        </div>
    </nav>
    <main class="flex-grow flex flex-col justify-center">
        {{ $slot }}
    </main>
</body>

</html>