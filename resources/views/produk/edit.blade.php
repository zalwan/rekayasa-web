@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="mx-auto max-w-xl rounded-md border border-zinc-200 bg-white p-6">
        <h1 class="text-2xl font-bold">Edit Product</h1>

        <form action="{{ route('produk.update', $produk) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
            @csrf
            @method('PUT')
            @include('produk.partials.form', ['produk' => $produk])

            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">Update</button>
                <a href="{{ route('produk.index') }}" class="text-sm font-medium text-zinc-600 hover:text-zinc-900">Cancel</a>
            </div>
        </form>
    </div>
@endsection
