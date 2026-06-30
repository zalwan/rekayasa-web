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
}
