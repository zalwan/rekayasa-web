<?php

namespace Database\Seeders;

use App\Models\ProdukKerajinan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]
        );

        $products = [
            [
                'id_produk' => 'PKT-001',
                'nama_produk' => 'Vas Anyaman Rotan',
                'bahan' => 'Rotan',
                'harga' => 125000,
                'pengrajin' => 'Rizal Suryawan',
            ],
            [
                'id_produk' => 'PKT-002',
                'nama_produk' => 'Tas Tenun Etnik',
                'bahan' => 'Kain tenun',
                'harga' => 225000,
                'pengrajin' => 'Siti Aminah',
            ],
            [
                'id_produk' => 'PKT-003',
                'nama_produk' => 'Lampu Hias Bambu',
                'bahan' => 'Bambu',
                'harga' => 175000,
                'pengrajin' => 'Asep Hidayat',
            ],
            [
                'id_produk' => 'PKT-004',
                'nama_produk' => 'Topeng Kayu Ukir',
                'bahan' => 'Kayu mahoni',
                'harga' => 95000,
                'pengrajin' => 'Dedi Pratama',
            ],
            [
                'id_produk' => 'PKT-005',
                'nama_produk' => 'Keranjang Serbaguna',
                'bahan' => 'Pandan',
                'harga' => 85000,
                'pengrajin' => 'Nanda Lestari',
            ],
            [
                'id_produk' => 'PKT-006',
                'nama_produk' => 'Dompet Kulit Handmade',
                'bahan' => 'Kulit sapi',
                'harga' => 150000,
                'pengrajin' => 'Bima Santoso',
            ],
        ];

        foreach ($products as $product) {
            ProdukKerajinan::updateOrCreate(
                ['id_produk' => $product['id_produk']],
                $product
            );
        }
    }
}
