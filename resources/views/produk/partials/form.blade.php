@php($produk ??= null)

<div>
    <label for="id_produk" class="block text-sm font-medium text-zinc-700">Product ID</label>
    <input type="text" name="id_produk" id="id_produk" value="{{ old('id_produk', $produk?->id_produk) }}" required class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600">
</div>

<div>
    <label for="nama_produk" class="block text-sm font-medium text-zinc-700">Product Name</label>
    <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk?->nama_produk) }}" required class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600">
</div>

<div>
    <label for="bahan" class="block text-sm font-medium text-zinc-700">Material</label>
    <input type="text" name="bahan" id="bahan" value="{{ old('bahan', $produk?->bahan) }}" required class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600">
</div>

<div>
    <label for="harga" class="block text-sm font-medium text-zinc-700">Price</label>
    <input type="number" name="harga" id="harga" step="0.01" min="0" value="{{ old('harga', $produk?->harga) }}" required class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600">
</div>

<div>
    <label for="pengrajin" class="block text-sm font-medium text-zinc-700">Artisan</label>
    <input type="text" name="pengrajin" id="pengrajin" value="{{ old('pengrajin', $produk?->pengrajin) }}" required class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-blue-600">
</div>

<div>
    <label for="gambar" class="block text-sm font-medium text-zinc-700">Image</label>
    @if ($produk?->gambar)
        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="my-2 h-32 w-32 rounded-md object-cover">
    @endif
    <input type="file" name="gambar" id="gambar" accept="image/*" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm">
</div>
