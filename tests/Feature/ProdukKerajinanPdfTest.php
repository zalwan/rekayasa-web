<?php

namespace Tests\Feature;

use App\Models\ProdukKerajinan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProdukKerajinanPdfTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_export_pdf(): void
    {
        $this->get('/produk/export-pdf')
            ->assertRedirect('/login');
    }

    public function test_authenticated_user_can_export_pdf(): void
    {
        ProdukKerajinan::create([
            'id_produk' => 'PRD-010',
            'nama_produk' => 'Keranjang Rotan',
            'bahan' => 'Rotan',
            'harga' => 150000,
            'pengrajin' => 'Rizal',
        ]);

        $this->actingAs($this->admin())
            ->get('/produk/export-pdf')
            ->assertOk()
            ->assertHeader('content-type', 'application/pdf');
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
