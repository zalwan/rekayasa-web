@extends('layouts.app')

@section('title', 'Admin Produk')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase text-blue-700">Admin</p>
            <h1 class="text-2xl font-bold">Kelola Produk Kerajinan</h1>
            <p class="mt-1 text-sm text-zinc-600">Gunakan tabel ini untuk mencari, mengurutkan, menambah, mengedit, menghapus, dan export PDF.</p>
        </div>

        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.produk.export-pdf') }}" class="inline-flex rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">Export PDF</a>
            <a href="{{ route('admin.produk.create') }}" class="inline-flex rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Tambah Produk</a>
        </div>
    </div>

    @if ($produks->isEmpty())
        <div class="rounded-md border border-zinc-200 bg-white p-6 text-zinc-600">Belum ada produk.</div>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->id_produk }}</td>
                            <td>
                                <a href="{{ route('produk.show', $produk) }}">
                                    @if ($produk->imageUrl())
                                        <img src="{{ $produk->imageUrl() }}" alt="{{ $produk->nama_produk }}" class="h-16 w-16 rounded-md object-cover">
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
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.produk.edit', $produk) }}" class="rounded-md bg-amber-500 px-3 py-1.5 text-sm font-medium text-white hover:bg-amber-600">Edit</a>
                                    <form action="{{ route('admin.produk.destroy', $produk) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-700">Delete</button>
                                    </form>
                                </div>
                            </td>
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
