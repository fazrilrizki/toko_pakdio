<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 12,
            'product_types_id' => 1,
            'product_name' => 'Skyline GTR',
            'product_stock' => 50,
            'product_price' => 30000,
            'product_photo' => 'img/product/product1.jpg',
            'product_description' => 'Mainan Hotwheels dengan mobil bermerk Mazda RX-7'

        ];
        Product::create($data);
    }
}
