@extends('layouts.app')

@section('title', 'Katalog Produk Kerajinan')

@section('content')
    <section id="product-catalog" class="space-y-5">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-zinc-950">Daftar Produk</h2>
                <p class="text-sm text-zinc-600">{{ $produks->count() }} produk tersedia untuk dilihat.</p>
            </div>
            @auth
                <a href="{{ route('admin.produk.index') }}" class="inline-flex w-fit rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700">Kelola Produk</a>
            @endauth
        </div>

        @if ($produks->isEmpty())
            <div class="rounded-md border border-zinc-200 bg-white p-6 text-zinc-600">Belum ada produk.</div>
        @else
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($produks as $produk)
                    <article class="product-card flex flex-col overflow-hidden rounded-md border border-zinc-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md">
                        <a href="{{ route('produk.show', $produk) }}" class="group flex w-full flex-col">
                            <div class="relative overflow-hidden bg-zinc-100">
                            @if ($produk->imageUrl())
                                <img src="{{ $produk->imageUrl() }}" alt="{{ $produk->nama_produk }}" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-105">
                            @else
                                <div class="flex aspect-[4/3] w-full items-center justify-center text-sm text-zinc-500">No Image</div>
                            @endif
                                <span class="absolute left-3 top-3 rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-emerald-700 shadow-sm">Kode Produk</span>
                            </div>
                        </a>
                        <div class="flex flex-1 flex-col space-y-4 p-5">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ $produk->id_produk }}</p>
                                <h3 class="mt-2 text-xl font-bold leading-snug text-zinc-950">{{ $produk->nama_produk }}</h3>
                            </div>
                            <dl class="grid grid-cols-2 gap-3 rounded-md bg-zinc-50 p-3 text-sm">
                                <div class="min-w-0">
                                    <dt class="text-zinc-500">Bahan</dt>
                                    <dd class="mt-1 truncate font-medium text-zinc-900">{{ $produk->bahan }}</dd>
                                </div>
                                <div class="min-w-0">
                                    <dt class="text-zinc-500">Pengrajin</dt>
                                    <dd class="mt-1 truncate font-medium text-zinc-900">{{ $produk->pengrajin }}</dd>
                                </div>
                            </dl>
                            <div class="mt-auto space-y-3 border-t border-zinc-100 pt-4">
                                <p class="text-2xl font-bold text-zinc-950">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('produk.show', $produk) }}" class="inline-flex w-full justify-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection
