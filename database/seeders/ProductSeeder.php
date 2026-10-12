<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // kategori => [nama produk realistis]
        $data = [
            'Elektronik' => [
                'Headphone Bluetooth Pro', 'Smartwatch Fit 3', 'Power Bank 20000mAh',
                'Speaker Portable Mini', 'Mouse Wireless Silent', 'Keyboard Mekanik RGB',
                'Webcam Full HD 1080p', 'Charger Fast 65W', 'Earbuds TWS Air',
                'Lampu Meja LED Pintar',
            ],
            'Fashion' => [
                'Kaos Polos Cotton Combed', 'Kemeja Flanel Kotak', 'Jaket Hoodie Fleece',
                'Celana Chino Slim Fit', 'Sepatu Sneakers Putih', 'Tas Ransel Anti Air',
                'Topi Baseball Classic', 'Jam Tangan Analog', 'Sandal Slide Nyaman',
                'Dompet Kulit Pria',
            ],
            'Rumah Tangga' => [
                'Rice Cooker 1.8 Liter', 'Blender Kaca 2 Liter', 'Set Panci Anti Lengket',
                'Dispenser Air Panas Dingin', 'Setrika Uap Portable', 'Vacuum Cleaner Mini',
                'Teko Listrik Stainless', 'Rak Sepatu 4 Tingkat', 'Bantal Memory Foam',
                'Selimut Bulu Halus',
            ],
            'Olahraga' => [
                'Matras Yoga Anti Slip', 'Dumbbell Set 10 Kg', 'Sepatu Lari Ringan',
                'Botol Minum 1 Liter', 'Raket Badminton Carbon', 'Bola Futsal Ukuran 4',
                'Skipping Rope Speed', 'Resistance Band Set', 'Tas Gym Duffel',
                'Sarung Tangan Fitness',
            ],
            'Buku & Alat Tulis' => [
                'Buku Catatan A5 Hardcover', 'Pulpen Gel Hitam 12 Pcs', 'Stabilo Warna Pastel',
                'Tas Laptop 14 Inch', 'Kalkulator Scientific', 'Spidol Whiteboard Set',
                'Planner Mingguan 2026', 'Penggaris Besi 30 Cm', 'Map Dokumen Plastik',
                'Pensil Mekanik 0.5 mm',
            ],
            'Kecantikan' => [
                'Sunscreen SPF 50 Gel', 'Facial Wash Sensitive', 'Serum Vitamin C 20ml',
                'Pelembap Wajah Ringan', 'Lip Balm Strawberry', 'Masker Wajah Tanah Liat',
                'Parfum Floral 50ml', 'Sisir Rambut Anti Kusut', 'Hair Dryer Lipat',
                'Handbody Lotion Shea',
            ],
        ];

        foreach ($data as $categoryName => $products) {
            $category = Category::create([
                'name'        => $categoryName,
                'slug'        => Str::slug($categoryName),
                'description' => "Koleksi produk kategori {$categoryName}.",
            ]);

            foreach ($products as $productName) {
                Product::create([
                    'category_id' => $category->id,
                    'name'        => $productName,
                    'slug'        => Str::slug($productName),
                    'description' => "{$productName} berkualitas, cocok untuk kebutuhan sehari-hari.",
                    'price'       => fake()->numberBetween(15, 800) * 1000,
                    'stock'       => fake()->numberBetween(0, 120),
                    'is_active'   => fake()->boolean(90),
                ]);
            }
        }
    }
}