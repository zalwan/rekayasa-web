@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="overflow-hidden rounded-md border border-zinc-200 bg-white">
        <div class="grid min-h-[500px] gap-0 lg:grid-cols-[1fr_0.95fr]">
            <div class="flex flex-col justify-center p-6 sm:p-10 lg:p-12">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase text-emerald-700">Beranda</span>
                    <span class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-semibold uppercase text-zinc-600">Tugas UAS Rekayasa Web</span>
                </div>
                <h1 class="mt-5 max-w-2xl text-4xl font-bold leading-tight text-zinc-950 sm:text-5xl">Produk Kerajinan Tangan</h1>
                <p class="mt-4 max-w-xl text-base leading-7 text-zinc-600">Katalog digital untuk produk kerajinan lokal, dibuat dengan Laravel sebagai project UAS yang rapi, mudah dibaca, dan siap dipresentasikan.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('produk.index') }}" class="rounded-md bg-emerald-700 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-800">Lihat Produk</a>
                    <a href="{{ route('about') }}" class="rounded-md border border-zinc-300 px-5 py-3 text-sm font-semibold text-zinc-700 hover:bg-zinc-50">Tentang Project</a>
                </div>
                <dl class="mt-8 grid max-w-xl grid-cols-3 gap-3 border-t border-zinc-100 pt-6 text-sm">
                    <div>
                        <dt class="text-2xl font-bold text-zinc-950">6</dt>
                        <dd class="mt-1 text-zinc-500">produk contoh</dd>
                    </div>
                    <div>
                        <dt class="text-2xl font-bold text-zinc-950">CRUD</dt>
                        <dd class="mt-1 text-zinc-500">admin produk</dd>
                    </div>
                    <div>
                        <dt class="text-2xl font-bold text-zinc-950">PDF</dt>
                        <dd class="mt-1 text-zinc-500">export laporan</dd>
                    </div>
                </dl>
            </div>
            <div class="grid min-h-80 grid-cols-2 gap-3 bg-zinc-100 p-3 sm:p-5">
                <img src="{{ asset('images/sample-products/pkt-001-vas-anyaman-rotan.png') }}" alt="Vas anyaman rotan" class="h-full min-h-72 w-full rounded-md object-cover">
                <div class="grid gap-3">
                    <img src="{{ asset('images/sample-products/pkt-002-tas-tenun-etnik.png') }}" alt="Tas tenun etnik" class="h-full min-h-36 w-full rounded-md object-cover">
                    <img src="{{ asset('images/sample-products/pkt-003-lampu-hias-bambu.png') }}" alt="Lampu hias bambu" class="h-full min-h-36 w-full rounded-md object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-3">
        <div class="rounded-md border border-zinc-200 bg-white p-5">
            <p class="text-sm font-semibold text-emerald-700">Katalog</p>
            <h2 class="mt-2 text-lg font-bold text-zinc-950">Produk lokal</h2>
            <p class="mt-2 text-sm leading-6 text-zinc-600">Data produk tampil bersih dengan foto, harga, bahan, dan nama pengrajin.</p>
        </div>
        <div class="rounded-md border border-zinc-200 bg-white p-5">
            <p class="text-sm font-semibold text-blue-700">Admin</p>
            <h2 class="mt-2 text-lg font-bold text-zinc-950">CRUD produk</h2>
            <p class="mt-2 text-sm leading-6 text-zinc-600">Kelola produk dari halaman admin dengan form upload gambar dan validasi.</p>
        </div>
        <div class="rounded-md border border-zinc-200 bg-white p-5">
            <p class="text-sm font-semibold text-amber-700">Project</p>
            <h2 class="mt-2 text-lg font-bold text-zinc-950">Tugas UAS</h2>
            <p class="mt-2 text-sm leading-6 text-zinc-600">Dibuat sebagai implementasi Laravel, Blade, Tailwind CSS, MySQL, dan DomPDF.</p>
        </div>
    </section>
@endsection
