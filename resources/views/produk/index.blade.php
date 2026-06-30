@extends('layouts.app')

@section('title', 'Katalog Produk Kerajinan')

@section('content')
    <section class="mb-8 overflow-hidden rounded-md border border-zinc-200 bg-white">
        <div class="grid gap-0 md:grid-cols-[1.1fr_0.9fr]">
            <div class="flex flex-col justify-center p-6 sm:p-8">
                <p class="text-sm font-semibold uppercase text-emerald-700">Katalog Kerajinan Tangan</p>
                <h1 class="mt-3 max-w-2xl text-3xl font-bold leading-tight text-zinc-950 sm:text-4xl">Produk buatan pengrajin lokal dengan bahan pilihan.</h1>
                <p class="mt-4 max-w-xl text-sm leading-6 text-zinc-600 sm:text-base">Temukan koleksi produk kerajinan tangan mulai dari rotan, bambu, kain tenun, kayu ukir, sampai kulit handmade.</p>
            </div>
            <div class="min-h-64 bg-zinc-100">
                @if ($produks->first()?->gambar)
                    <img src="{{ asset('storage/' . $produks->first()->gambar) }}" alt="{{ $produks->first()->nama_produk }}" class="h-full min-h-64 w-full object-cover">
                @else
                    <div class="flex h-full min-h-64 items-center justify-center text-zinc-500">Produk Kerajinan</div>
                @endif
            </div>
        </div>
    </section>

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
                    <article class="overflow-hidden rounded-md border border-zinc-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <a href="{{ route('produk.show', $produk) }}" class="block">
                            @if ($produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="aspect-[4/3] w-full object-cover">
                            @else
                                <div class="flex aspect-[4/3] w-full items-center justify-center bg-zinc-100 text-sm text-zinc-500">No Image</div>
                            @endif
                        </a>
                        <div class="space-y-4 p-5">
                            <div>
                                <p class="text-xs font-semibold uppercase text-emerald-700">{{ $produk->id_produk }}</p>
                                <h3 class="mt-1 text-lg font-bold text-zinc-950">{{ $produk->nama_produk }}</h3>
                            </div>
                            <dl class="grid grid-cols-2 gap-3 text-sm">
                                <div>
                                    <dt class="text-zinc-500">Bahan</dt>
                                    <dd class="mt-1 font-medium text-zinc-900">{{ $produk->bahan }}</dd>
                                </div>
                                <div>
                                    <dt class="text-zinc-500">Pengrajin</dt>
                                    <dd class="mt-1 font-medium text-zinc-900">{{ $produk->pengrajin }}</dd>
                                </div>
                            </dl>
                            <div class="flex items-center justify-between gap-3 border-t border-zinc-100 pt-4">
                                <p class="text-lg font-bold text-zinc-950">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('produk.show', $produk) }}" class="rounded-md bg-emerald-700 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-800">Detail</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection
