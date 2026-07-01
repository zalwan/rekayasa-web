<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'crud_uas_067'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col bg-zinc-100 text-zinc-900 antialiased">
    <nav class="border-b border-zinc-200 bg-white">
        <div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 py-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="text-lg font-semibold">Produk kerajinan</a>
            <div class="flex flex-wrap items-center gap-4 text-sm">
                <a href="{{ route('home') }}" class="font-medium {{ request()->routeIs('home') ? 'text-emerald-700' : 'text-zinc-600 hover:text-zinc-950' }}">Beranda</a>
                <a href="{{ route('produk.index') }}" class="font-medium {{ request()->routeIs('produk.*') ? 'text-emerald-700' : 'text-zinc-600 hover:text-zinc-950' }}">Produk</a>
                <a href="{{ route('about') }}" class="font-medium {{ request()->routeIs('about') ? 'text-emerald-700' : 'text-zinc-600 hover:text-zinc-950' }}">Tentang</a>
                <a href="{{ route('contact') }}" class="font-medium {{ request()->routeIs('contact') ? 'text-emerald-700' : 'text-zinc-600 hover:text-zinc-950' }}">Kontak</a>
                @auth
                    <a href="{{ route('admin.produk.index') }}" class="font-medium text-blue-600 hover:text-blue-700">Admin Produk</a>
                    <span class="font-medium">{{ auth()->user()->username }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-medium text-red-600 hover:text-red-700">Logout</button>
                    </form>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-700">Masuk</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl flex-1 px-4 py-8">
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
            &copy; 2026 - Rizal Suryawan - crud_uas_067
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
