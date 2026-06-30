@extends('layouts.app')

@section('title', $produk->nama_produk)

@section('content')
    <article class="grid gap-6 rounded-md border border-zinc-200 bg-white p-6 md:grid-cols-2">
        @if ($produk->gambar)
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="h-80 w-full rounded-md object-cover">
        @else
            <div class="flex h-80 w-full items-center justify-center rounded-md bg-zinc-100 text-zinc-500">No Image</div>
        @endif

        <div>
            <p class="text-sm font-medium text-zinc-500">{{ $produk->id_produk }}</p>
            <h1 class="mt-1 text-3xl font-bold">{{ $produk->nama_produk }}</h1>
            <dl class="mt-6 space-y-3">
                <div>
                    <dt class="text-sm text-zinc-500">Bahan</dt>
                    <dd class="font-medium">{{ $produk->bahan }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-zinc-500">Harga</dt>
                    <dd class="font-medium">Rp {{ number_format($produk->harga, 0, ',', '.') }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-zinc-500">Pengrajin</dt>
                    <dd class="font-medium">{{ $produk->pengrajin }}</dd>
                </div>
            </dl>
            <a href="{{ route('produk.index') }}" class="mt-6 inline-flex text-sm font-medium text-blue-600 hover:text-blue-700">Back to products</a>
        </div>
    </article>
@endsection
