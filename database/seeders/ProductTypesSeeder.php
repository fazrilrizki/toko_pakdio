<?php

namespace Database\Seeders;

use App\Models\ProductTypesModel;
use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 1,
            'types_name' => 'Hotwheels'
        ];
        ProductTypesModel::create($data);
    }
}
