<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Tailwind CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-black text-gray-900 dark:text-white">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <!-- Header with Login/Register -->
        <header class="absolute top-0 right-0 m-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Start New Order</a>
                    @else
                        <a href="{{ route('login') }}" class="underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        
        <!-- Main Content -->
        <main class="px-6 py-4">
            <h1 class="text-3xl font-bold text-center mb-6">Welcome to The Pizza Site</h1>
            <div class="mb-6 w-full">
                <h2 class="text-2xl font-semibold text-center">Toppings Available</h2>
                <div class="flex flex-wrap justify-center gap-2 mt-4">
                    @foreach ($toppings as $topping)
                        <span class="bg-gray-200 dark:bg-gray-700 text-black dark:text-white py-2 px-4 rounded-full shadow-sm">
                            {{ $topping->name }}
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pizzas as $pizza)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold">{{ $pizza->name }}</h2>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($pizza->sizes as $size)
                                <li>{{ $size->size }} - £{{ number_format($size->price, 2) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>
