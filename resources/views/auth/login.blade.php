@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
    <div class="mx-auto max-w-md rounded-md border border-zinc-200 bg-white p-6">
        <h1 class="text-2xl font-bold">Masuk</h1>
        <div class="mt-4 rounded-md border border-blue-100 bg-blue-50 p-4 text-sm text-blue-900">
            <p class="font-semibold">Akun demo admin</p>
            <p class="mt-1">Username: <span class="font-mono font-semibold">admin</span></p>
            <p>Password: <span class="font-mono font-semibold">password</span></p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-zinc-700">Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    value="{{ old('username') }}"
                    required
                    autofocus
                    class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-zinc-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600"
                >
            </div>

            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                Masuk
            </button>
        </form>
    </div>
@endsection
