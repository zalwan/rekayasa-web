@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold">Handicraft Products</h1>
            <p class="mt-1 text-sm text-zinc-600">Produk kerajinan tangan untuk UAS Web Engineering.</p>
        </div>

        @auth
            <div class="flex gap-2">
                <a href="{{ route('produk.export-pdf') }}" class="inline-flex rounded-md bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-700">Export PDF</a>
                <a href="{{ route('produk.create') }}" class="inline-flex rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">Add Product</a>
            </div>
        @endauth
    </div>

    @if ($produks->isEmpty())
        <div class="rounded-md border border-zinc-200 bg-white p-6 text-zinc-600">No products yet.</div>
    @else
        <div class="overflow-x-auto rounded-md border border-zinc-200 bg-white p-4">
            <table id="products-table" class="display w-full text-sm">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Bahan</th>
                        <th>Harga</th>
                        <th>Pengrajin</th>
                        @auth
                            <th>Aksi</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->id_produk }}</td>
                            <td>
                                <a href="{{ route('produk.show', $produk) }}">
                                    @if ($produk->gambar)
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="h-16 w-16 rounded-md object-cover">
                                    @else
                                        <span class="text-zinc-500">No Image</span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('produk.show', $produk) }}" class="font-medium text-blue-600 hover:text-blue-700">{{ $produk->nama_produk }}</a>
                            </td>
                            <td>{{ $produk->bahan }}</td>
                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->pengrajin }}</td>
                            @auth
                                <td>
                                    <div class="flex gap-2">
                                        <a href="{{ route('produk.edit', $produk) }}" class="rounded-md bg-amber-500 px-3 py-1.5 text-sm font-medium text-white hover:bg-amber-600">Edit</a>
                                        <form action="{{ route('produk.destroy', $produk) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script>
        const productsTable = document.querySelector('#products-table');
        if (productsTable) {
            new DataTable(productsTable);
        }
    </script>
@endpush
