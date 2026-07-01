@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="overflow-hidden rounded-md border border-zinc-200 bg-white">
        <div class="grid gap-0 lg:grid-cols-[1fr_0.8fr]">
            <div class="flex flex-col justify-center p-6 sm:p-10">
                <p class="text-sm font-semibold uppercase text-emerald-700">Beranda</p>
                <h1 class="mt-3 max-w-2xl text-3xl font-bold leading-tight text-zinc-950 sm:text-5xl">Produk Kerajinan Tangan</h1>
                <p class="mt-4 max-w-xl text-base leading-7 text-zinc-600">Website katalog sederhana untuk menampilkan produk kerajinan tangan lokal, lengkap dengan halaman admin untuk mengelola data produk.</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('produk.index') }}" class="rounded-md bg-emerald-700 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-800">Lihat Product</a>
                    <a href="{{ route('about') }}" class="rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50">Tentang Project</a>
                </div>
            </div>
            <div class="min-h-72 bg-zinc-100">
                <img src="{{ asset('images/sample-products/pkt-001-vas-anyaman-rotan.png') }}" alt="Produk kerajinan vas anyaman rotan" class="h-full min-h-72 w-full object-cover">
            </div>
        </div>
    </section>

    <section class="mt-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-md border border-zinc-200 bg-white p-5">
            <p class="text-sm font-semibold text-zinc-500">Katalog</p>
            <h2 class="mt-2 text-lg font-bold text-zinc-950">Produk lokal</h2>
            <p class="mt-2 text-sm leading-6 text-zinc-600">Menampilkan produk kerajinan dengan bahan, harga, pengrajin, dan gambar.</p>
        </div>
        <div class="rounded-md border border-zinc-200 bg-white p-5">
            <p class="text-sm font-semibold text-zinc-500">Admin</p>
            <h2 class="mt-2 text-lg font-bold text-zinc-950">CRUD produk</h2>
            <p class="mt-2 text-sm leading-6 text-zinc-600">Admin dapat menambah, mengubah, menghapus, dan export laporan produk.</p>
        </div>
        <div class="rounded-md border border-zinc-200 bg-white p-5">
            <p class="text-sm font-semibold text-zinc-500">Project</p>
            <h2 class="mt-2 text-lg font-bold text-zinc-950">Tugas UAS</h2>
            <p class="mt-2 text-sm leading-6 text-zinc-600">Dibuat sebagai implementasi aplikasi web berbasis Laravel untuk kebutuhan akademik.</p>
        </div>
    </section>
@endsection
