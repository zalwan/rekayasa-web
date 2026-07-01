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
            ->assertSee('brand-logo', false)
            ->assertSeeText('KL')
            ->assertSeeText('Kriya Lokal')
            ->assertSeeText('Kerajinan tangan')
            ->assertSeeText('Beranda')
            ->assertSeeText('Produk Kerajinan Tangan')
            ->assertSeeText('Kerajinan Lokal Pilihan')
            ->assertSeeText('Temukan pilihan kerajinan tangan lokal dengan bahan berkualitas, tampilan detail produk yang jelas, dan informasi pengrajin yang mudah dipahami.')
            ->assertSeeText('6')
            ->assertSeeText('produk contoh')
            ->assertDontSeeText('project UAS')
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
            ->assertSeeText('Tentang Proyek')
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
            ->assertSeeText('Pemilik Proyek')
            ->assertSeeText('03SIFE003')
            ->assertSeeText('Tugas UAS Rekayasa Web')
            ->assertSeeText('Situs Web')
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
