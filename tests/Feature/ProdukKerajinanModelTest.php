<?php

namespace Tests\Feature;

use App\Models\ProdukKerajinan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdukKerajinanModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_produk_kerajinan_can_be_created_with_mandatory_columns(): void
    {
        $produk = ProdukKerajinan::create([
            'id_produk' => 'PRD-001',
            'gambar' => 'gambar_produk/vas.jpg',
            'nama_produk' => 'Vas Anyaman',
            'bahan' => 'Rotan',
            'harga' => 125000,
            'pengrajin' => 'Rizal',
        ]);

        $this->assertDatabaseHas('produk_kerajinan', [
            'id_produk' => 'PRD-001',
            'nama_produk' => 'Vas Anyaman',
            'bahan' => 'Rotan',
            'harga' => 125000,
            'pengrajin' => 'Rizal',
        ]);
        $this->assertSame('produk_kerajinan', $produk->getTable());
    }
}
