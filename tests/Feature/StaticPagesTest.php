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
            ->assertSeeText('Tugas UAS Rekayasa Web')
            ->assertSeeText('6')
            ->assertSeeText('produk contoh')
            ->assertSee('pkt-001-vas-anyaman-rotan.png', false)
            ->assertSee('pkt-002-tas-tenun-etnik.png', false)
            ->assertSee('pkt-003-lampu-hias-bambu.png', false)
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
            ->assertSee('profile-card', false)
            ->assertSeeText('RIZAL SURYAWAN')
            ->assertSeeText('Project Owner')
            ->assertSeeText('03SIFE003')
            ->assertSeeText('Tugas UAS Rekayasa Web')
            ->assertSeeText('Website')
            ->assertSeeText('LinkedIn')
            ->assertSee('https://zal.pages.dev', false)
            ->assertSee('https://id.linkedin.com/in/rizal-suryawan/in', false)
            ->assertSee('https://zal.pages.dev/img/rizal-img.webp', false);
    }

    public function test_layout_keeps_footer_at_bottom_on_short_pages(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('class="min-h-screen flex flex-col', false)
            ->assertSee('<main class="mx-auto max-w-6xl flex-1', false);
    }
}
