<?php

namespace Tests\Feature;

use App\Models\ProdukKerajinan;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_seeder_adds_admin_and_sample_products(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertDatabaseHas('users', ['username' => 'admin']);
        $this->assertSame(6, ProdukKerajinan::count());
        $this->assertDatabaseHas('produk_kerajinan', [
            'id_produk' => 'PKT-001',
            'nama_produk' => 'Vas Anyaman Rotan',
            'bahan' => 'Rotan',
            'pengrajin' => 'Rizal Suryawan',
        ]);

        ProdukKerajinan::all()->each(function (ProdukKerajinan $product): void {
            $this->assertNotEmpty($product->gambar);
            Storage::disk('public')->assertExists($product->gambar);
        });
    }
}
