@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <div class="mx-auto max-w-4xl">
        <div class="mb-6">
            <p class="text-sm font-semibold text-blue-700">Admin / Produk / Edit</p>
            <h1 class="mt-1 text-2xl font-bold text-zinc-950">Edit Produk</h1>
            <p class="mt-2 text-sm text-zinc-600">Perbarui data produk kerajinan tangan dan simpan perubahan.</p>
        </div>

        <form action="{{ route('admin.produk.update', $produk) }}" method="POST" enctype="multipart/form-data" class="rounded-md border border-zinc-200 bg-white p-5 sm:p-6">
            @csrf
            @method('PUT')
            @include('produk.partials.form', ['produk' => $produk])

            <div class="mt-6 flex flex-col-reverse gap-3 border-t border-zinc-100 pt-5 sm:flex-row sm:items-center sm:justify-end">
                <a href="{{ route('admin.produk.index') }}" class="inline-flex justify-center rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50">Batal</a>
                <button type="submit" class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
