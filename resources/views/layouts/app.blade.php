<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'UAS Web Engineering'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-zinc-100 text-zinc-900 antialiased">
    <nav class="border-b border-zinc-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="text-lg font-semibold">Handicraft Products</a>
            <div class="flex items-center gap-4 text-sm">
                @auth
                    <a href="{{ route('admin.produk.index') }}" class="font-medium text-blue-600 hover:text-blue-700">Admin Produk</a>
                    <span class="font-medium">{{ auth()->user()->username }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-medium text-red-600 hover:text-red-700">Logout</button>
                    </form>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-700">Login</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-4 py-8">
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-600 px-4 py-3 text-sm font-medium text-white">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-md bg-red-600 px-4 py-3 text-sm text-white">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-zinc-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-4 text-center text-sm text-zinc-500">
            &copy; 2026 - Rizal Suryawan - UAS Web Engineering
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
