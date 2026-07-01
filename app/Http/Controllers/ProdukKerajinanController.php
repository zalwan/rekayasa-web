<?php

namespace App\Http\Controllers;

use App\Models\ProdukKerajinan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdukKerajinanController extends Controller
{
    public function publicIndex(): View
    {
        return view('produk.index', [
            'produks' => ProdukKerajinan::latest()->get(),
        ]);
    }

    public function adminIndex(): View
    {
        return view('produk.admin.index', [
            'produks' => ProdukKerajinan::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('produk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar_produk', 'public');
        }

        ProdukKerajinan::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(ProdukKerajinan $produk): View
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(ProdukKerajinan $produk): View
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, ProdukKerajinan $produk): RedirectResponse
    {
        $validated = $this->validateProduct($request, $produk);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('gambar_produk', 'public');
        }

        $produk->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(ProdukKerajinan $produk): RedirectResponse
    {
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function exportPdf(): Response
    {
        $pdf = Pdf::loadView('produk.pdf', [
            'produks' => ProdukKerajinan::orderBy('id_produk')->get(),
        ]);

        return $pdf->download('daftar_produk_kerajinan.pdf');
    }

    private function validateProduct(Request $request, ?ProdukKerajinan $produk = null): array
    {
        $ignoreId = $produk ? ',' . $produk->id : '';

        return $request->validate([
            'id_produk' => ['required', 'string', 'max:255', 'unique:produk_kerajinan,id_produk' . $ignoreId],
            'nama_produk' => ['required', 'string', 'min:3', 'max:255'],
            'bahan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
            'pengrajin' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
    }
}
