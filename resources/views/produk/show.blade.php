@extends('layouts.app')

@section('title', $produk->nama_produk)

@section('content')
    <article class="product-detail overflow-hidden rounded-md border border-zinc-200 bg-white">
        <div class="grid gap-0 lg:grid-cols-[1.05fr_0.95fr]">
            <div class="bg-zinc-100 p-3 sm:p-5">
                @if ($produk->imageUrl())
                    <img src="{{ $produk->imageUrl() }}" alt="{{ $produk->nama_produk }}" class="aspect-[4/3] w-full rounded-md object-cover">
                @else
                    <div class="flex aspect-[4/3] w-full items-center justify-center rounded-md bg-zinc-200 text-sm text-zinc-500">No Image</div>
                @endif
            </div>

            <div class="flex flex-col justify-center p-6 sm:p-8">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase text-emerald-700">Kode Produk</span>
                    <span class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-semibold uppercase text-zinc-600">{{ $produk->id_produk }}</span>
                </div>

                <h1 class="mt-5 text-3xl font-bold leading-tight text-zinc-950 sm:text-4xl">{{ $produk->nama_produk }}</h1>
                <p class="mt-4 text-3xl font-bold text-zinc-950">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                <div class="mt-7 rounded-md border border-zinc-200 bg-zinc-50 p-5">
                    <h2 class="text-sm font-semibold uppercase text-zinc-500">Informasi Produk</h2>
                    <dl class="mt-4 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-md bg-white p-4">
                            <dt class="text-sm text-zinc-500">Bahan</dt>
                            <dd class="mt-1 font-semibold text-zinc-950">{{ $produk->bahan }}</dd>
                        </div>
                        <div class="rounded-md bg-white p-4">
                            <dt class="text-sm text-zinc-500">Pengrajin</dt>
                            <dd class="mt-1 font-semibold text-zinc-950">{{ $produk->pengrajin }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-7 flex flex-col-reverse gap-3 sm:flex-row sm:items-center">
                    <a href="{{ route('produk.index') }}" class="inline-flex justify-center rounded-md border border-zinc-300 px-4 py-2.5 text-sm font-semibold text-zinc-700 hover:bg-zinc-50">Kembali ke Produk</a>
                    @auth
                        <a href="{{ route('admin.produk.edit', $produk) }}" class="inline-flex justify-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800">Edit Produk</a>
                    @endauth
                </div>
            </div>
        </div>
    </article>
@endsection
