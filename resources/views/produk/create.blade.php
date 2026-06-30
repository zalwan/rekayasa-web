@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="mx-auto max-w-xl rounded-md border border-zinc-200 bg-white p-6">
        <h1 class="text-2xl font-bold">Add Product</h1>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
            @csrf
            @include('produk.partials.form')

            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">Save</button>
                <a href="{{ route('produk.index') }}" class="text-sm font-medium text-zinc-600 hover:text-zinc-900">Cancel</a>
            </div>
        </form>
    </div>
@endsection
