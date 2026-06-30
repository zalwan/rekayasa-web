<?php

namespace Tests\Feature;

use App\Models\ProdukKerajinan;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProdukKerajinanCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_product_index_shows_products(): void
    {
        ProdukKerajinan::create([
            'id_produk' => 'PRD-001',
            'nama_produk' => 'Vas Anyaman',
            'bahan' => 'Rotan',
            'harga' => 125000,
            'pengrajin' => 'Rizal',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Vas Anyaman')
            ->assertSee('Rotan')
            ->assertSee('Rizal');
    }

    public function test_public_product_index_shows_catalog_without_datatable(): void
    {
        ProdukKerajinan::create([
            'id_produk' => 'PRD-006',
            'nama_produk' => 'Dompet Kulit',
            'bahan' => 'Kulit',
            'harga' => 150000,
            'pengrajin' => 'Nanda',
        ]);

        $this->get(route('produk.index'))
            ->assertOk()
            ->assertSee('product-catalog', false)
            ->assertDontSee('id="products-table"', false)
            ->assertDontSee('cdn.datatables.net', false);
    }

    public function test_admin_product_index_includes_datatable(): void
    {
        ProdukKerajinan::create([
            'id_produk' => 'PRD-007',
            'nama_produk' => 'Kotak Kayu',
            'bahan' => 'Kayu',
            'harga' => 180000,
            'pengrajin' => 'Dina',
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.produk.index'))
            ->assertOk()
            ->assertSee('id="products-table"', false)
            ->assertSee('cdn.datatables.net', false);
    }

    public function test_guest_cannot_open_create_product_page(): void
    {
        $this->get('/admin/produk/create')
            ->assertRedirect('/login');
    }

    public function test_authenticated_user_can_create_product_with_image(): void
    {
        $this->withoutMiddleware(ValidateCsrfToken::class);
        Storage::fake('public');

        $this->actingAs($this->admin())
            ->post('/admin/produk', [
                'id_produk' => 'PRD-002',
                'nama_produk' => 'Tas Tenun',
                'bahan' => 'Kain',
                'harga' => 225000,
                'pengrajin' => 'Suryawan',
                'gambar' => UploadedFile::fake()->image('tas.jpg'),
            ])
            ->assertRedirect(route('admin.produk.index'));

        $produk = ProdukKerajinan::firstOrFail();

        $this->assertSame('PRD-002', $produk->id_produk);
        $this->assertNotNull($produk->gambar);
        Storage::disk('public')->assertExists($produk->gambar);
    }

    public function test_authenticated_user_can_update_product_and_replace_image(): void
    {
        $this->withoutMiddleware(ValidateCsrfToken::class);
        Storage::fake('public');
        $oldImage = UploadedFile::fake()->image('old.jpg')->store('gambar_produk', 'public');
        $produk = ProdukKerajinan::create([
            'id_produk' => 'PRD-003',
            'gambar' => $oldImage,
            'nama_produk' => 'Lampu Bambu',
            'bahan' => 'Bambu',
            'harga' => 175000,
            'pengrajin' => 'Asep',
        ]);

        $this->actingAs($this->admin())
            ->put("/admin/produk/{$produk->id}", [
                'id_produk' => 'PRD-004',
                'nama_produk' => 'Lampu Bambu Ukir',
                'bahan' => 'Bambu Hitam',
                'harga' => 195000,
                'pengrajin' => 'Asep',
                'gambar' => UploadedFile::fake()->image('new.jpg'),
            ])
            ->assertRedirect(route('admin.produk.index'));

        $produk->refresh();

        $this->assertSame('PRD-004', $produk->id_produk);
        $this->assertSame('Lampu Bambu Ukir', $produk->nama_produk);
        Storage::disk('public')->assertMissing($oldImage);
        Storage::disk('public')->assertExists($produk->gambar);
    }

    public function test_authenticated_user_can_delete_product_and_image(): void
    {
        $this->withoutMiddleware(ValidateCsrfToken::class);
        Storage::fake('public');
        $image = UploadedFile::fake()->image('delete.jpg')->store('gambar_produk', 'public');
        $produk = ProdukKerajinan::create([
            'id_produk' => 'PRD-005',
            'gambar' => $image,
            'nama_produk' => 'Topeng Kayu',
            'bahan' => 'Kayu',
            'harga' => 95000,
            'pengrajin' => 'Dedi',
        ]);

        $this->actingAs($this->admin())
            ->delete("/admin/produk/{$produk->id}")
            ->assertRedirect(route('admin.produk.index'));

        $this->assertDatabaseMissing('produk_kerajinan', ['id' => $produk->id]);
        Storage::disk('public')->assertMissing($image);
    }

    private function admin(): User
    {
        return User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
