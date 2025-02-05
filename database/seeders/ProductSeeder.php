<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with adjustable DPI and silent clicks.',
                'price' => 25.99
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB backlit mechanical keyboard with blue switches for tactile feedback.',
                'price' => 79.99
            ],
            [
                'name' => 'Bluetooth Headphones',
                'description' => 'Noise-canceling over-ear Bluetooth headphones with 40-hour battery life.',
                'price' => 59.99
            ],
            [
                'name' => 'Gaming Monitor',
                'description' => '27-inch 144Hz gaming monitor with 1ms response time and FreeSync.',
                'price' => 299.99
            ],
            [
                'name' => 'External SSD',
                'description' => '1TB USB-C external SSD with 1050MB/s read speed.',
                'price' => 129.99
            ],
            [
                'name' => 'Smartwatch',
                'description' => 'Water-resistant smartwatch with heart rate monitor and GPS tracking.',
                'price' => 199.99
            ],
            [
                'name' => 'Portable Speaker',
                'description' => 'Compact Bluetooth speaker with deep bass and 12-hour battery life.',
                'price' => 49.99
            ],
            [
                'name' => 'Wireless Charger',
                'description' => 'Fast 15W wireless charger compatible with Qi-enabled devices.',
                'price' => 29.99
            ],
            [
                'name' => '4K Webcam',
                'description' => 'Ultra HD 4K webcam with autofocus and built-in noise reduction mic.',
                'price' => 89.99
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'Adjustable ergonomic chair with lumbar support and breathable mesh back.',
                'price' => 189.99
            ]
        ];


        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'description' => $product['description'],
            ]);
        }
    }
}
