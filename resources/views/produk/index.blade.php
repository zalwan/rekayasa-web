@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold">Handicraft Products</h1>
            <p class="mt-1 text-sm text-zinc-600">Produk kerajinan tangan untuk UAS Web Engineering.</p>
        </div>

        @auth
            <a href="{{ route('produk.create') }}" class="inline-flex rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                Add Product
            </a>
        @endauth
    </div>

    @if ($produks->isEmpty())
        <div class="rounded-md border border-zinc-200 bg-white p-6 text-zinc-600">No products yet.</div>
    @else
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            @foreach ($produks as $produk)
                <article class="rounded-md border border-zinc-200 bg-white p-4">
                    <a href="{{ route('produk.show', $produk) }}">
                        @if ($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="h-48 w-full rounded-md object-cover">
                        @else
                            <div class="flex h-48 w-full items-center justify-center rounded-md bg-zinc-100 text-sm text-zinc-500">No Image</div>
                        @endif
                    </a>

                    <h2 class="mt-3 text-lg font-semibold">{{ $produk->nama_produk }}</h2>
                    <p class="text-sm text-zinc-600">ID: {{ $produk->id_produk }}</p>
                    <dl class="mt-3 space-y-1 text-sm">
                        <div class="flex justify-between gap-4">
                            <dt class="text-zinc-500">Bahan</dt>
                            <dd class="font-medium">{{ $produk->bahan }}</dd>
                        </div>
                        <div class="flex justify-between gap-4">
                            <dt class="text-zinc-500">Harga</dt>
                            <dd class="font-medium">Rp {{ number_format($produk->harga, 0, ',', '.') }}</dd>
                        </div>
                        <div class="flex justify-between gap-4">
                            <dt class="text-zinc-500">Pengrajin</dt>
                            <dd class="font-medium">{{ $produk->pengrajin }}</dd>
                        </div>
                    </dl>

                    @auth
                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('produk.edit', $produk) }}" class="rounded-md bg-amber-500 px-3 py-1.5 text-sm font-medium text-white hover:bg-amber-600">Edit</a>
                            <form action="{{ route('produk.destroy', $produk) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-700">Delete</button>
                            </form>
                        </div>
                    @endauth
                </article>
            @endforeach
        </div>
    @endif
@endsection
