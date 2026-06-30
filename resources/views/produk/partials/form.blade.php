@php($produk ??= null)

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label for="id_produk" class="block text-sm font-medium text-zinc-700">ID Produk</label>
        <input type="text" name="id_produk" id="id_produk" value="{{ old('id_produk', $produk?->id_produk) }}" required placeholder="PKT-007" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm outline-none focus:border-blue-600">
        <p class="mt-1 text-xs text-zinc-500">Contoh: PKT-007</p>
        @error('id_produk')
            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="nama_produk" class="block text-sm font-medium text-zinc-700">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk?->nama_produk) }}" required placeholder="Contoh: Tas Tenun Etnik" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm outline-none focus:border-blue-600">
        @error('nama_produk')
            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="bahan" class="block text-sm font-medium text-zinc-700">Bahan</label>
        <input type="text" name="bahan" id="bahan" value="{{ old('bahan', $produk?->bahan) }}" required placeholder="Rotan, bambu, kain tenun" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm outline-none focus:border-blue-600">
        @error('bahan')
            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="harga" class="block text-sm font-medium text-zinc-700">Harga</label>
        <input type="number" name="harga" id="harga" step="1" min="0" value="{{ old('harga', $produk?->harga) }}" required placeholder="150000" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm outline-none focus:border-blue-600">
        <p class="mt-1 text-xs text-zinc-500">Masukkan angka tanpa titik atau koma.</p>
        @error('harga')
            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="pengrajin" class="block text-sm font-medium text-zinc-700">Pengrajin</label>
        <input type="text" name="pengrajin" id="pengrajin" value="{{ old('pengrajin', $produk?->pengrajin) }}" required placeholder="Nama pengrajin" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm outline-none focus:border-blue-600">
        @error('pengrajin')
            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="gambar" class="block text-sm font-medium text-zinc-700">Gambar</label>
        <input type="file" name="gambar" id="gambar" accept="image/*" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 text-sm file:mr-3 file:rounded-md file:border-0 file:bg-zinc-900 file:px-3 file:py-1.5 file:text-sm file:font-medium file:text-white">
        <p class="mt-1 text-xs text-zinc-500">Format JPG atau PNG, maksimal 2 MB.</p>
        @error('gambar')
            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-5">
    <p class="mb-2 text-sm font-medium text-zinc-700">Preview Gambar</p>
    <div class="overflow-hidden rounded-md border border-dashed border-zinc-300 bg-zinc-50">
        @if ($produk?->imageUrl())
            <img id="image-preview" src="{{ $produk->imageUrl() }}" alt="{{ $produk->nama_produk }}" class="aspect-[16/9] w-full object-cover">
        @else
            <div id="image-preview-empty" class="flex aspect-[16/9] w-full items-center justify-center px-4 text-center text-sm text-zinc-500">Preview akan muncul setelah gambar dipilih.</div>
            <img id="image-preview" src="" alt="Preview gambar produk" class="hidden aspect-[16/9] w-full object-cover">
        @endif
    </div>
</div>

@push('scripts')
    <script>
        function previewProductImage(event) {
            const input = event.target;
            const preview = document.querySelector('#image-preview');
            const emptyPreview = document.querySelector('#image-preview-empty');

            if (!input.files || !input.files[0] || !preview) {
                return;
            }

            preview.src = URL.createObjectURL(input.files[0]);
            preview.classList.remove('hidden');
            emptyPreview?.classList.add('hidden');
        }

        document.querySelector('#gambar')?.addEventListener('change', previewProductImage);
    </script>
@endpush
