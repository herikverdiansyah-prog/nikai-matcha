<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan proteksi sementara agar bisa dikosongkan secara total
        \Schema::disableForeignKeyConstraints();
        Product::truncate();
        \Schema::enableForeignKeyConstraints();

        // Produk 1
        Product::create([
            'name' => 'Komorebi Midori Matcha - Samidori Matcha',
            'slug' => Str::slug('Komorebi Midori Matcha - Samidori Matcha'),
            'original_price' => 104000,
            'sale_price' => 93600,
            'image' => 'matcha-pack1.jpg',
            'description' => 'Premium ceremonial grade matcha.'
        ]);

        // Produk 2
        Product::create([
            'name' => 'Ajisai Takara - Culinary Grade Matcha',
            'slug' => Str::slug('Ajisai Takara - Culinary Grade Matcha'),
            'original_price' => 39000,
            'sale_price' => 35100,
            'image' => 'matcha-pack2.jpg',
            'description' => 'Excellent for baking and lattes.'
        ]);

        // Produk 3
        Product::create([
            'name' => 'Yakine Midori Matcha - Hojicha / Roasted Matcha 1',
            'slug' => Str::slug('Yakine Midori Matcha - Hojicha / Roasted Matcha 1'), // Slug Unik
            'original_price' => 104000,
            'sale_price' => null,
            'image' => 'matcha-pack3.jpg',
            'description' => 'Rich and smoky roasted green tea powder.'
        ]);

        // Produk 4
        Product::create([
            'name' => 'Yakine Midori Matcha - Hojicha / Roasted Matcha 2',
            'slug' => Str::slug('Yakine Midori Matcha - Hojicha / Roasted Matcha 2'), // Slug Unik
            'original_price' => 104000,
            'sale_price' => null,
            'image' => 'matcha-pack4.jpg',
            'description' => 'Rich and smoky roasted green tea powder.'
        ]);

        // Produk 5
        Product::create([
            'name' => 'Yakine Midori Matcha - Hojicha / Roasted Matcha 3',
            'slug' => Str::slug('Yakine Midori Matcha - Hojicha / Roasted Matcha 3'), // Slug Unik
            'original_price' => 104000,
            'sale_price' => null,
            'image' => 'matcha-pack5.jpg',
            'description' => 'Rich and smoky roasted green tea powder.'
        ]);

        // Produk 6
        Product::create([
            'name' => 'Yakine Midori Matcha - Hojicha / Roasted Matcha 4',
            'slug' => Str::slug('Yakine Midori Matcha - Hojicha / Roasted Matcha 4'), // Slug Unik
            'original_price' => 104000,
            'sale_price' => null,
            'image' => 'matcha-pack6.jpg',
            'description' => 'Rich and smoky roasted green tea powder.'
        ]);

        // Produk 7
        Product::create([
            'name' => 'Yakine Midori Matcha - Hojicha / Roasted Matcha 5',
            'slug' => Str::slug('Yakine Midori Matcha - Hojicha / Roasted Matcha 5'), // Slug Unik
            'original_price' => 104000,
            'sale_price' => null,
            'image' => 'matcha-pack7.jpg',
            'description' => 'Rich and smoky roasted green tea powder.'
        ]);
    }

}
