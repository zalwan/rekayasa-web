<?php

namespace Tests\Feature;

use App\Models\ProdukKerajinan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StaticPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_can_be_rendered(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText('Beranda')
            ->assertSeeText('Produk Kerajinan Tangan')
            ->assertSee(route('produk.index'), false);
    }

    public function test_about_page_explains_project_without_product_catalog(): void
    {
        ProdukKerajinan::create([
            'id_produk' => 'PRD-001',
            'nama_produk' => 'Vas Anyaman',
            'bahan' => 'Rotan',
            'harga' => 125000,
            'pengrajin' => 'Rizal',
        ]);

        $this->get(route('about'))
            ->assertOk()
            ->assertSeeText('Tentang Project')
            ->assertSeeText('Laravel 12')
            ->assertSeeText('Tugas UAS')
            ->assertDontSeeText('Vas Anyaman');
    }

    public function test_contact_page_shows_owner_profile(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSeeText('RIZAL SURYAWAN')
            ->assertSeeText('03SIFE003')
            ->assertSee('https://zal.pages.dev', false)
            ->assertSee('https://id.linkedin.com/in/rizal-suryawan/in', false)
            ->assertSee('https://zal.pages.dev/img/rizal-img.webp', false);
    }
}
