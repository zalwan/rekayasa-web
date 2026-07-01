@extends('layouts.app')

@section('title', 'Tentang Project')

@section('content')
    <section class="rounded-md border border-zinc-200 bg-white p-6 sm:p-8">
        <p class="text-sm font-semibold uppercase text-emerald-700">About</p>
        <h1 class="mt-3 text-3xl font-bold text-zinc-950">Tentang Project</h1>
        <p class="mt-4 max-w-3xl text-sm leading-7 text-zinc-600 sm:text-base">Project ini adalah aplikasi CRUD produk kerajinan tangan yang dibuat untuk kebutuhan Tugas UAS mata kuliah Rekayasa Web. Aplikasi berfokus pada pengelolaan data produk, tampilan katalog publik, autentikasi admin, upload gambar, dan export laporan PDF.</p>
    </section>

    <section class="mt-6 grid gap-5 md:grid-cols-2">
        <div class="rounded-md border border-zinc-200 bg-white p-6">
            <h2 class="text-xl font-bold text-zinc-950">Tech Stack</h2>
            <dl class="mt-4 space-y-3 text-sm">
                <div class="flex justify-between gap-4 border-b border-zinc-100 pb-3">
                    <dt class="text-zinc-500">Backend</dt>
                    <dd class="font-medium text-zinc-950">Laravel 12</dd>
                </div>
                <div class="flex justify-between gap-4 border-b border-zinc-100 pb-3">
                    <dt class="text-zinc-500">Frontend</dt>
                    <dd class="font-medium text-zinc-950">Blade, Tailwind CSS, Vite</dd>
                </div>
                <div class="flex justify-between gap-4 border-b border-zinc-100 pb-3">
                    <dt class="text-zinc-500">Database</dt>
                    <dd class="font-medium text-zinc-950">MySQL / SQLite</dd>
                </div>
                <div class="flex justify-between gap-4">
                    <dt class="text-zinc-500">Export</dt>
                    <dd class="font-medium text-zinc-950">DomPDF</dd>
                </div>
            </dl>
        </div>

        <div class="rounded-md border border-zinc-200 bg-white p-6">
            <h2 class="text-xl font-bold text-zinc-950">Kebutuhan UAS</h2>
            <p class="mt-4 text-sm leading-7 text-zinc-600">Aplikasi ini memenuhi kebutuhan dasar pengelolaan data produk kerajinan: ID produk, gambar, nama produk, bahan, harga, dan pengrajin. Halaman ini hanya menjelaskan konteks project, sehingga tidak menampilkan katalog produk.</p>
        </div>
    </section>
@endsection
