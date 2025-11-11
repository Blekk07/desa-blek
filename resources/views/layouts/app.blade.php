<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-lg font-bold">Sistem Informasi Desa</h1>
    </header>

    <main class="flex-grow p-6">
        @yield('content')
    </main>

    <footer class="bg-gray-200 text-center p-4">
        &copy; {{ date('Y') }} Sistem Informasi Desa
    </footer>
</body>
</html>
