<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans p-6">
    <div class="max-w-6xl mx-auto">

        <div class="flex space-x-4 mb-6">
            <a href="/"
               class="px-6 py-2 bg-blue-500 text-white hover:bg-blue-600">
                Countries
            </a>

            <a href="/users"
               class="px-6 py-2 bg-green-500 text-white hover:bg-green-600">
                Users
            </a>
        </div>

        <div>
            @if (request()->is('/'))
                <livewire:country.list-countries />
            @else
                <livewire:country.list-users />
            @endif
        </div>

    </div>
</body>
</html>
