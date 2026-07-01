<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKerajinan extends Model
{
    use HasFactory;

    protected $table = 'produk_kerajinan';

    protected $fillable = [
        'id_produk',
        'gambar',
        'nama_produk',
        'bahan',
        'harga',
        'pengrajin',
    ];

    public function imageUrl(): ?string
    {
        if (! $this->gambar) {
            return null;
        }

        if (str_starts_with($this->gambar, 'images/')) {
            return asset($this->gambar);
        }

        return url('/produk-gambar/' . $this->gambar);
    }

    public function imagePublicPath(): ?string
    {
        if (! $this->gambar) {
            return null;
        }

        if (str_starts_with($this->gambar, 'images/')) {
            return public_path($this->gambar);
        }

        return public_path('storage/' . $this->gambar);
    }
}
